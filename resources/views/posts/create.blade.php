@extends('main')

@section('title','| Create New Post')

@section('stylesheets')
	<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
		tinymce.init({ 
			selector:'textarea',
			plugons: 'link',
			menubar: false
		});
	</script>
@endsection

@section('content')
	<div class='row'>
		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
		    <h1>Create New Post</h1>
		    <hr>
		    <form method="POST" action="{{ route('posts.store') }}" data-parsley-validate="">
		      <div class="form-group">
		        <label name="title">Title:</label>
		        <input id="title" name="title" class="form-control" required="" maxlength="255">
		      </div>
		      <div class="form-group">
		        <label name="slug">Slug:</label>
		        <input id="slug" name="slug" class="form-control" required="" maxlength="255" minlength="5">
		      </div>
		      <div class="form-group">
		      	<label name="category_id">Category:</label>
		      	<select class="form-control" name="category_id">
		      		@foreach($categories as $category)
		      			<option value="{{  $category->id }}">{{ $category->name }}</option>
		      		@endforeach
		      	</select>
		      </div>

		       <div class="form-group">
		      	<label name="tags">Tags:</label>
		      	<select class="form-control select2-multi" name="tags[]" multiple="multiple">
		      		@foreach($tags as $tag)
		      			<option value="{{  $tag->id }}">{{ $tag->name }}</option>
		      		@endforeach
		      	</select>
		      </div>

		      <div class="form-group">
		        <label name="body">Post Body:</label>
		        <textarea id="body" name="body" rows="10" class="form-control"></textarea>
		      </div>
		      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
		      <input type="hidden" name="_token" value="{{ Session::token() }}">
		    </form>
		  </div>
		</div>﻿
	</div>
@endsection

@section('scripts')
	<script src= "{{ URL::asset('js/parsley.min.js') }}"></script>
	<script src= "{{ URL::asset('js/select2.min.js') }}"></script>

	<script type="text/javascript">
		$(".select2-multi").select2();
	</script>
@endsection
