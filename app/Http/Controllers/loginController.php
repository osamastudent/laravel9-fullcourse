<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

use Illuminate\Support\Facades\Cookie;
use Session;
class loginController extends Controller
{
    function login()
    {
        return view('login');
    }
public function navbarjs(){
return view('navbarjs');
}
// public function setSession(){
// $email=session()->put('email','emaillll@gmail.com');
// return $email;
// }

// public function getSession(){
// // $session=session()->all();
// $email=session()->get('email');
// return $email;
// // return redirect('getsession');
// }



    public function loginUser(Request $req)
{
    $remember = $req->remember;
    // $semail = $req->email;
    $email = $req->session()->put('email',$req->email);
    $email = $req->email;
    $password = $req->password;

    if ($remember){
        // $minute=60*24*30;
        $minute = 1;
        Cookie::queue('email', $email, $minute);
        Cookie::queue('password', $password, $minute);
        return redirect('/');
    } else {
        return back();
    }
}




public function responseget()
    {
        $password = cookie::get('password');
        $email=Cookie::get('email'); 
        // $semail=session()->get('email'); 
        // dd($semail);

        return view('responseget', compact('password', 'email'));
    }


    public function deletesession()
    {
        session()->forget('email');
        return redirect('/login');
    }


    public function deletecookie(){
    Cookie::queue(Cookie::forget('email'));
    return back();
    }







}
