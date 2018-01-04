<?php

namespace App\Http\Controllers;

class PagesController extends Controller{

	public function getIndex(){
		return view('pages.welcome');
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
}