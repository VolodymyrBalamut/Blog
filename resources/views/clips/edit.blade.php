@extends('main')

@section('title','| View Clip')

@section('stylesheets')
	<link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
@endsection

@section('content')
	<form method="POST" action="{{ route('clips.update', $clip->id) }}">
	  <div class="row">
	  	<div class="col-md-8">
	      <div class="form-group">
	        <label for="name">Name:</label>
	        <textarea type="text" class="form-control input-lg" id="name" name="name" rows="1" style="resize:none;">{{ $clip->name }}</textarea>
	      </div>
	      <div class="form-group form-spacing-top">
	        <label for="url">Url:</label>
	        <textarea type="text" class="form-control input-lg" id="url" name="url" rows="1" style="resize:none;">{{ $clip->url }}</textarea>
	      </div>
	    </div>
	    <div class="col-md-4">
	      <div class="well">
	        <dl class="dl-horizontal">
	          <dt>Created at:</dt>
	          <dd>{{ date('M j, Y H:i', strtotime($clip->created_at)) }}</dd>
	        </dl>

	        <dl class="dl-horizontal">
	          <dt>Last updated:</dt>
	          <dd>{{ date('M j, Y H:i', strtotime($clip->updated_at)) }}</dd>
	        </dl>
	        <hr>
	        <div class="row">
	          <div class="col-sm-6">
	            <a href="{{ route('clips.show', $clip->id) }}" class="btn btn-danger btn-block">Cancel</a>
	          </div>
	          <div class="col-sm-6">
	              <button type="submit" class="btn btn-success btn-block">Save</button>
	              <input type="hidden" name="_token" value="{{ Session::token() }}">
	              {{ method_field('PUT') }}
        	  </div>
        	</div>
           </div>
         </div>
       </div>
    </form>﻿
@endsection

@section('scripts')
	<script src= "{{ URL::asset('js/select2.min.js') }}"></script>
@endsection