<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{

	public function getIndex(){
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout(){
		$data = [];
		$first = 'Volodymyr';
		$last = 'Balamut';

		$full = $first . " " . $last;
		$email = 'balamut@gmail.com';
		$telephone = '+3808543535';

		$data["fullname"] = $full;
		$data["email"] = $email;
		$data["telephone"] = $telephone;
		//return view('pages.about')->withFullname($full)->withEmail($email)->withData($data);
		return view('pages.about')->withData($data);
	}

	public function getContact(){
		$email = 'balamut@gmail.com';
		$telephone = '+3808543535';
		$data = [];
		$data["email"] = $email;
		$data["telephone"] = $telephone;
		return view('pages.contact')->withData($data);
	}

	public function postContact(Request $request){
		$this->validate($request, array(
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10'
		));

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);

		Mail::send('emails.contact',$data, function($message) use ($data){
			$message->from($data['email']);
			$message->to("myemail@gmail.com");
			$message->subject($data['subject']);
		});

		Session::flash('success',"Your Email was sent!");

		return redirect('/');
	}
	/*public function getTryAngular(){
		return view('pages.tryAngular');
	}*/
}