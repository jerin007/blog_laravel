<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthoriesResources;
use DB;

class loginController extends BaseController
{

    public function getLogin(){
      return view('auth.login');
    }

    public function login(Request $req){
      $username = $req->input('username');
      $password = $req->input('password');

      $checklogin =DB::table('users')->where(['username'=>$username,'password'=>$password])->get();
      if(count($checklogin)> 0){
        return view('pages.welcome');
      }
      else{
        echo "Login Failed";
      }
    }

    public function getSignup(){
      return view('auth.signup');
    }

    public function register(Request $req){
      $username = $req->input('username');
      $password = $req->input('password');

      $checklogin =DB::table('users')->where(['username'=>$username,'password'=>$password])->get();
      if(count(checklogin)> 0){
        echo "username and password already exsits!!!";
      }
      else{

      }
    }

}
