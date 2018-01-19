@extends('main')

@section('title','| View Record')

@section('content')
	<form method="POST" action="{{ route('records.update', $record->id) }}">
	  <div class="row">
	  	<div class="col-md-8">
	      <div class="form-group">
	        <label for="exercise">Вправа:</label>
	        <textarea type="text" class="form-control input-lg" id="exercise" name="exercise" rows="1" style="resize:none;">{{ $record->exercise }}</textarea>
	      </div>
	      <div class="form-group form-spacing-top">
	        <label for="value">5РМ:</label>
	        <textarea type="text" class="form-control input-lg" id="value" name="value" rows="1">{{ $record->value }}</textarea>
	      </div>
	      <div class="form-group form-spacing-top">
	        <label for="unit">Одиниці виміру:</label>
	        <textarea type="text" class="form-control input-lg" id="unit" name="unit" rows="1">{{ $record->unit }}</textarea>
	      </div>
	    </div>
	    <div class="col-md-4">
	      <div class="well">
	        <dl class="dl-horizontal">
	          <dt>Created at:</dt>
	          <dd>{{ date('M j, Y H:i', strtotime($record->created_at)) }}</dd>
	        </dl>

	        <dl class="dl-horizontal">
	          <dt>Last updated:</dt>
	          <dd>{{ date('M j, Y H:i', strtotime($record->updated_at)) }}</dd>
	        </dl>
	        <hr>
	        <div class="row">
	          <div class="col-sm-6">
	            <a href="{{ route('records.show', $record->id) }}" class="btn btn-danger btn-block">Cancel</a>
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