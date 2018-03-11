@extends('main')

@section('title', '| DELETE COMMENT?')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>DELETE THIS COMMENT?</h1>
			<p>
				<strong>Name:</strong> {{ $comment->name }}</br>
				<strong>Email:</strong> {{ $comment->email }}</br>
				<strong>Comment:</strong> {{ $comment->comment }}</br>
			</p>

			<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
			    <input type="submit" value="YES DELETE THIS COMMENT" class="btn btn-danger btn-block">
			    <input type="hidden" name="_token" value="{{ Session::token() }}">
			   {{ method_field('DELETE') }}
			</form>﻿
		</div>
	</div>
@endsection