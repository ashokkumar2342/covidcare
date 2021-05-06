<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdminsOtp;
use App\Model\BlocksMcs;
use App\Model\BloodGroups;
use App\Model\District;
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

class RegistrationController extends Controller
{
    public function mobileVerification()
    {   
        return view('registration.mobile');
    }
    public function mobileVerificationStore(Request $request )
    {   
        $this->validate($request, [
            'mobile_no' => 'required',  
            'captcha' => 'required|captcha' 
        ]); 
      
        $mobile =$request->mobile_no; 
        $otp=DB::select(DB::raw("call up_generate_otp_newuser ('$mobile')"));  
        $response=array();
        $response["status"]=1;
        $response["msg"]="Send Otp Sucessfully"; 

        return redirect()->route('user.mobile.verification.otp',Crypt::encrypt($mobile))->with(['message'=>'Sent Otp Sucessfully','class'=>'success']);
         

    }
    public function mobileVerificationOtp($mobile )
    {   
          
        $mobile =Crypt::decrypt($mobile);  
         return view('registration.verification',compact('mobile')); 
    }
    public function mobileOtpVerification(Request $request,$mobile )
    {   
        $mobile =Crypt::decrypt($mobile); 
        $otp =$request->otp; 
        $adminsOtp =AdminsOtp::where('mobile_no',$mobile)->orderBy('id','DESC')->first(); 
        if ($adminsOtp->otp ==$otp) {
            $adminsOtp->otp_verified=1;
            $adminsOtp->save();
            return redirect()->route('user.registration',Crypt::encrypt($mobile))->with(['message'=>'OTP Verify Successfully','class'=>'success']);
             
        }else{
           return redirect()->back()->with(['message'=>'Invalid OTP','class'=>'success']); 
        }
        
       

    }
    public function registration($mobile)
    {   
        $mobile =Crypt::decrypt($mobile);
        $blood_groups =BloodGroups::all();
        $districts =District::all();
        $data =array();
        $data['mobile']= $mobile;
        $data['blood_groups']= $blood_groups;
        $data['districts']= $districts;
        return view('registration.registration',$data);
    }
    public function blockMcs(Request $request)
    {   
        $district_id =$request->id;
        $blocksMcs =BlocksMcs::where('districts_id',$district_id)->orderBy('name_e','ASC')->get();
         
        $data =array();
        $data['district_id']= $district_id; 
        $data['blocksMcs']= $blocksMcs;
        return view('registration.blocks_mcs',$data);
    }
    public function village(Request $request,$district_id)
    {   
        $blocks_id =$request->id; 
        $villages =Village::where('districts_id',$district_id)->where('blocks_id',$blocks_id)->orderBy('name_e','ASC')->get();
         
        $data =array();
        $data['district_id']= $district_id; 
        $data['blocks_id']= $blocks_id;
        $data['villages']= $villages;
        return view('registration.village',$data);
    }

    public function store(Request $request,$mobile)
    {   
        
        $rules=[
           'name' => 'required|max:100',
           'father_name' => 'required|max:100', 
           'mobile_no' => 'required|digits:10', 
           'email' => 'nullable|email', 
           'address' => 'required', 
           'pincode' => 'required', 
           'blood_group' => 'required',  
           'district_id' => 'required',  
           'block_id' => 'required',  
           'village_id' => 'required',  
        ]; 
           $validator = Validator::make($request->all(),$rules);
           if ($validator->fails()) {
               $errors = $validator->errors()->all();
               $response=array();
               $response["status"]=0;
               $response["msg"]=$errors[0];
               return response()->json($response);// response as json
           }  
       $user = new RegistrationPlasama();
       $user->name = $request->name;
       $user->father_name = $request->father_name;
       $user->mobile_no = Crypt::decrypt($mobile);
       $user->email = $request->email;
       $user->address = $request->address;
       $user->pincode = $request->pincode;
       $user->blood_group = $request->blood_group; 
       $user->district_id = $request->district_id; 
       $user->block_id = $request->block_id; 
       $user->village_id = $request->village_id;  
       $user->save();  
       $response=array();
       $response["status"]=1;
       $response["msg"]="Submit Sucessfully";
       return response()->json($response);// response as json
       // return redirect()->back();
    }
   
}
