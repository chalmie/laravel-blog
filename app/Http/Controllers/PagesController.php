<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PagesController extends Controller
{
    public function getIndex() {
      $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
      return view('pages.welcome')->withPosts($posts);
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
