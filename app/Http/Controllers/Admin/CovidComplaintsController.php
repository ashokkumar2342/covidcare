<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdminsOtp;
use App\Model\BlocksMcs;
use App\Model\BloodGroups;
use App\Model\ComplaintTypes;
use App\Model\CovidComplaints;
use App\Model\District;
use App\Model\OfficerComplaints;
use App\Model\RegistrationPlasama;
use App\Model\Village;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Storage;

class CovidComplaintsController extends Controller
{
    public function index()
    {   
      $blood_groups =BloodGroups::all();
      $districts =District::all();
      $ComplaintTypes =ComplaintTypes::all();
      $OfficerComplaints =OfficerComplaints::all();
      $data =array(); 
      $data['blood_groups']= $blood_groups;
      $data['ComplaintTypes']= $ComplaintTypes;
      $data['OfficerComplaints']= $OfficerComplaints;
      $data['districts']= $districts;
        return view('covid_complaints.index',$data);
    }
    

    public function store(Request $request)
    {   
        
        $rules=[
           'name' => 'required|max:100',
           'father_name' => 'required|max:100', 
           'mobile_no' => 'required|digits:10',  
           'address' => 'required',   
           'district_id' => 'required',  
           'block_id' => 'required',  
           'village_id' => 'required',  
           'complaint_remarks' => 'required',  
           'complaint_type_id' => 'required',  
           'complaint_related_to' => 'required',  
        ]; 
           $validator = Validator::make($request->all(),$rules);
           if ($validator->fails()) {
               $errors = $validator->errors()->all();
               $response=array();
               $response["status"]=0;
               $response["msg"]=$errors[0];
               return response()->json($response);// response as json
           }  
       $CovidComplaints = new CovidComplaints();
       $CovidComplaints->name = $request->name;
       $CovidComplaints->father_name = $request->father_name;
       $CovidComplaints->mobile_no = $request->mobile_no; 
       $CovidComplaints->address = $request->address;

       $CovidComplaints->district_id = $request->district_id; 
       $CovidComplaints->block_id = $request->block_id; 
       $CovidComplaints->village_id = $request->village_id;  
       $CovidComplaints->complaint_date = date('Y-m-d');  
       $CovidComplaints->complaint_type_id = $request->complaint_type_id;  
       $CovidComplaints->complaint_remarks = $request->complaint_remarks;  
       $CovidComplaints->complaint_related_to = $request->complaint_related_to;  
       $CovidComplaints->complaint_status = 0;   
       $CovidComplaints->save();  
       $response=array();
       $response["status"]=1;
       $response["msg"]="Submit Sucessfully";
       return response()->json($response);// response as json
       // return redirect()->back();
    }
   
}
