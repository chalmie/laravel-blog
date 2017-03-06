<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Post;
use Session;

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

    public function postContact(Request $request) {
      $this->validate($request, array(
        'email' => 'required|email',
        'subject' => 'required|min:3',
        'message' => 'required|min:10'
      ));

      $data = array(
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message,
        'survey' => ['Q1' => "hello", 'Q2' => "YES"]
      );

      Mail::send('emails.contact', $data, function($message) use ($data) {
        $message->from($data['email']);
        $message->to('blairpetersoniv@gmail.com');
        $message->subject($data['subject']);
      });

      Session::flash('success', 'Your email was sent successfully.');
      return redirect()->route('home');
    }
}
