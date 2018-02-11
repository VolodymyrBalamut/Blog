<?php

namespace App\Http\Controllers;
use App\Post;

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

	/*public function getTryAngular(){
		return view('pages.tryAngular');
	}*/
}