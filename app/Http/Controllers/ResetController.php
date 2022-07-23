<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sign_table;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Validator;

class ResetController extends Controller
{
    public function reset(){
        return view('signup_up.reset');
    }

    public function rahul_otps(Request $request){ 
     $request->validate([
        'email'=>'required|email',
        'key2'=>'required|numeric',
    ]);
    // print_r($request);die();
  if($userinfo=Sign_table::where('email','=',$request->email)->first()){
        Sign_table::where('email',$request->email)
            ->update(['otp' => $request->key2]);          
        return response()->json([ 'success'=> 'Form is successfully submitted!']);
    }
    else{
        return response()->json([ 'error'=> 'Form is not success!']);
    }
    }

    public function confirm_submit(Request $request){
         $request->validate([
        'email'=>'required|email',
        'otp'=>'required|numeric',
        'password'=>'required',
    ]);
    if($userinfo=Sign_table::where('email','=',$request->email)->first() && $userinfo=Sign_table::where('otp','=',$request->otp)->first()){
        Sign_table::where('email',$request->email)
            ->update(['password' => Hash::make($request->password)]);          
        return response()->json([ 'success'=> 'OTP Password is successfully submitted!']);
    }
    else{
        return response()->json([ 'error'=> 'Reser password is not success!']);
    }
    }
public function remove_otp(Request $request){
    $request->validate([
        'prinnt'=>'required',
        // 'otp'=>'required|numeric',
       
    ]);
    // pr($request->email);die();
    if($userinfo=Sign_table::where('email','=',$request->prinnt)->first()){
        Sign_table::where('email',$request->prinnt)
            ->update(['otp' => $request->password=1234567]);          
        return response()->json([ 'success'=> 'Reset Password is successfully submitted!']);
    }
    else{
        return response()->json([ 'error'=> 'Reser password is not success!']);
    }
}
    
}
