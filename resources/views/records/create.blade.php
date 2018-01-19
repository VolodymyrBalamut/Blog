@extends('main')

@section('title','| Add Record')

@section('stylesheets')
	<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
@endsection

@section('content')
	<div class='row'>
		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
		    <h1>Add Record</h1>
		    <hr>
		    <form method="POST" action="{{ route('records.store') }}">
		      <div class="form-group">
		        <label name="exercise">Вправа:</label>
		        <input id="exercise" name="exercise" class="form-control">
		      </div>
		      <div class="form-group">
		        <label name="value">5РМ:</label>
		        <input id="value" name="value" class="form-control">
		      </div>
		      <div class="form-group">
		        <label name="unit">Одиниці виміру:</label>
		        <input id="unit" name="unit" class="form-control">
		      </div>
		      <input type="submit" value="Add Record" class="btn btn-success btn-lg btn-block">
		      <input type="hidden" name="_token" value="{{ Session::token() }}">
		    </form>
		  </div>
		</div>﻿
	</div>
@endsection

@section('scripts')
	<script src= "{{ URL::asset('js/parsley.min.js') }}"></script>
@endsection