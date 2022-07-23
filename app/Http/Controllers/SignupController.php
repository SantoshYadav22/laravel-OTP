<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use App\Models\Sign_table;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function sign(){
        return view('signup_up.sign_up');
    }

    public function login(){
        return view('signup_up.login');
    }

   
    // public function submit(Request $request){
    //     $validator =Validator::make($request->all(),[       
    //         'password' => 'required| min:6| max:12 | same:chef_confirm_password',
    //         'confirm_password' => 'required| min:6 | max:12'
    //      ]);        
         
    //         $data = array(
    //             'fname' => trim($request->post('fname')),
    //             'lname' => trim($request->post('lname')),
    //             'mobile' => trim($request->post('mobile')),
    //             'dob' => trim($request->post('dob')),
    //             'password' => trim($request->post('password')),
    //             'email' => trim($request->post('email')),
                           
    //             );
        
      

	// 			$data->save();
	// 			return redirect('signup')->with('status',"signup successfully");
	// 		}
    public function create(Request $request){
    //     $rules = [
    //         'password' => 'required| min:6| max:12 | same:chef_confirm_password',
    //         'confirm_password' => 'required| min:6 | max:12',
    //         'email' => 'required|string|email|max:255'
    //     ];
    //     $validator = Validator::make($request->all(),$rules);
        
    //     if ($validator->fails()) {
            
    //         return redirect('signup')
    //         ->withInput()
    //         ->withErrors($validator);
    //     }
    //     else{
    //         $data = $request->input();
    //         try{
    //             $student = new sign_tables;
    //             $student->fname = $data['fname'];
    //             $student->last_name = $data['lname'];
    //             $student->email = $data['email'];
    //             $student->password = $data['password'];
    //             $student->dob = $data['dob'];
    //             $student->mobile = $data['mobile'];
    //             $student->save();
    //             return redirect('signup')->with('status',"signup successfully");
    //         }
    //         catch(Exception $e){
    //             return redirect('signup')->with('failed',"operation failed");
    //         }
    //     }
    // }{
        $request->validate([
            'fname'           => 'required',
            'email'          => 'required|email',
            'lname'        => 'required',
            'mobile'  => 'required|numeric',
            'password' => 'required| min:6| max:12 | same:confirm_password',
            'confirm_password' => 'required| min:6 | max:12',
            'dob'        => 'required',
        ]);

        Sign_table::create([
           'fname'          => $request->fname,
           'email'         => $request->email,
           'lname'       => $request->lname,
           'mobile' => $request->mobile,
           'dob'       => $request->dob,
           'password'=>Hash::make($request->password),
        // 'password'=>$request->password,

       ]);
       return response()->json([ 'success'=> 'Form is successfully submitted!']);

   }
		
}
