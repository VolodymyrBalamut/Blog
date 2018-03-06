@extends('main')

@section('title','| All Categories')

@section('content')
		<div class="row">
			<div class="col-md-8">
				<h1>Categories</h1>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<th>{{ $category->id }}</th>
							<td>{{ $category->name }}</td>
							<td><a href="{{ route('categories.show',$category->id) }}">View</a></td>
							<td><a href="{{ route('categories.edit',$category->id) }}">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<div class="well">
					<form method="POST" action="{{ route('categories.store') }}" role="form">
					   <h2>New Category</h2>
					   <label for="name" class="label">Name:</label>
					   <input type="text" class="input {{$errors->has('name') ? 'is-danger' : ''}} form-control" name="name" id="name" value="{{old('name')}}" required>
					   <input type="submit" value="Create Category" class="btn btn-primary btn-block" style="margin-top:15px; ">
					   <input type="hidden" name="_token" value="{{ Session::token() }}">
					</form>﻿
				</div>
			</div>
		</div>


@endsection