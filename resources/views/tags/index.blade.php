@extends('main')

@section('title','| All Tags')

@section('content')
		<div class="row">
			<div class="col-md-8">
				<h1>Tags</h1>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tags as $tag)
						<tr>
							<th>{{ $tag->id }}</th>
							<td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a> </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<div class="well">
					<form method="POST" action="{{ route('tags.store') }}" role="form">
					   <h2>New Tag</h2>
					   <label for="name" class="label">Name:</label>
					   <input type="text" class="input {{$errors->has('name') ? 'is-danger' : ''}} form-control" name="name" id="name" value="{{old('name')}}" required>
					   <input type="submit" value="Create Tag" class="btn btn-primary btn-block" style="margin-top:15px; ">
					   <input type="hidden" name="_token" value="{{ Session::token() }}">
					</form>﻿
				</div>
			</div>
		</div>


@endsection