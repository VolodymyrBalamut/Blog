@extends('main')

@section('title','| Add New Clip')

@section('stylesheets')
	<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
@endsection

@section('content')
	<div class='row'>
		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
		    <h1>Add New Clip</h1>
		    <hr>
		    <form method="POST" action="{{ route('clips.store') }}" data-parsley-validate="">
		      <div class="form-group">
		        <label name="name">Name:</label>
		        <input id="name" name="name" class="form-control" required="" maxlength="255">
		      </div>
		      <div class="form-group">
		        <label name="url">Url:</label>
		        <input id="url" name="url" class="form-control" required="" maxlength="255" minlength="5">
		      </div>
		      <input type="submit" value="Add Clip" class="btn btn-success btn-lg btn-block">
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
