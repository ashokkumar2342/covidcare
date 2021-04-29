<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use App\Model\RegistrationUser; 
use Storage; 
use Intervention\Image\ImageManager;

class RegistrationController extends Controller
{
    public function index()
    {   
        return view('registration.index');
    }

    public function store(Request $request)
    {   
        
        $rules=[
           'name' => 'required|max:100',
           'father_name' => 'required|max:100', 
           'mobile_no' => 'required|digits:10', 
           'email' => 'nullable|email', 
           'address' => 'required', 
           'blood_group' => 'required',  
        ]; 
           $validator = Validator::make($request->all(),$rules);
           if ($validator->fails()) {
               $errors = $validator->errors()->all();
               $response=array();
               $response["status"]=0;
               $response["msg"]=$errors[0];
               return response()->json($response);// response as json
           }  
       $user = new RegistrationUser();
       $user->name = $request->name;
       $user->father_name = $request->father_name;
       $user->mobile_no = $request->mobile_no;
       $user->email = $request->email;
       $user->address = $request->address;
       $user->blood_group = $request->blood_group; 
       $user->status =1;
       $user->save();  
       $response=array();
       $response["status"]=1;
       $response["msg"]="Submit Sucessfully";
       return response()->json($response);// response as json
       // return redirect()->back();
    }
   
}
