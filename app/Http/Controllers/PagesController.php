<?php
namespace App\Http\Controllers;


class PagesController extends Controller
{
  public function getIndex(){
    return view('pages.welcome');
  }
  public function getAbout(){
    $first = 'Jerin';
    $last = 'Jahan';
    $fullname = $first . " " . $last;
    $email= "jerinjahan@ymail.com";
    $data=[];
    $data['fullname']=$fullname;
    $data['email']=$email;

    return view('pages.about')->withdata($data);
  }

  public function getContact(){
    return view('pages.contact');
  }

  public function getPostDetails(){
    return view('pages.details');
  }

}
