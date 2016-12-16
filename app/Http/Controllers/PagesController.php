<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
      return view('pages.welcome');
    }

    public function getAbout() {
      $firstname = "Blair";
      $email = "blairpetersoniv@gmail.com";
      $data = [];
      $data["firstname"] = $firstname;
      $data["email"] = $email;

      return view('pages.about')->withData($data);
    }

    public function getContact() {
      return view('pages.contact');
    }

    // public function postContact() {
    //
    // }
}
