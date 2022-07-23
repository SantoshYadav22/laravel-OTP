<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sign_table;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;

class LoginpController extends Controller
{
    public function login(Request $request){
        // return $request->input();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:10'
        ]);
        $userinfo=Sign_table::where('email','=',$request->email)->first();
        // $userinfo2=Sign_table::where('password','=',$request->password)->first();

        if(!$userinfo){
            return back()->with('fail','we do not recognize you');
        }
        else{
            if(Hash::check($request->password,$userinfo->password)){
                        $request->session()->put('LoggedUser',$userinfo->id);
                        return redirect('signup_up/user_dashboard');
                    }
                    else{
                        return back()->with('fail','Incorrect Password');
                    }
        }
      
        // else{
        //     if(Hash::check($request->password,$userinfo->password)){
        //         $request->session()->put('LoggedUser',$userinfo->id);
        //         return redirect('signup_up.login');
        //     }
        //     else{
        //         return back()->with('fail','Incorrect Password');
        //     }
        // }
    }    
    public function logout(){
        if(session()->has('LoggedUser')){

            session()->pull('LoggedUser');
            return redirect('/login_user');
        }
    }
    public function dashboard(){
        $data=['LoggedUserInfo'=>Sign_table::where('id','=',session('LoggedUser'))->first()];
        // print_r($data);die();
        return view('signup_up.user_dashboard',['data'=>$data]);
    }
   
}
