@extends('main')

@section('title', "| Edit Tag")

@section('content')
	<form method="POST" action="{{ route('tags.update', $tag->id) }}">
	  <div class="row">
	  	<div class="col-md-4">
	      <div class="form-group">
	        <label for="name">Title:</label>
	        <textarea type="text" class="form-control input-lg" id="name" name="name" rows="1" style="resize:none;">{{ $tag->name }}</textarea>
	      </div>
        </div>
        <div class="col-md-4">
        	<div class="row">
		        <div class="col-sm-6">
		            <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-danger btn-block">Cancel</a>
		        </div>
	        	<div class="col-sm-6">
		          <button type="submit" class="btn btn-success btn-block">Save</button>
		           <input type="hidden" name="_token" value="{{ Session::token() }}">
		              {{ method_field('PUT') }}
		        </div>
            </div>
        </div>
	  </div>
</form>

@endsection