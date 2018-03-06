@extends('main')

@section('title', "| $category->name Category")


@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $category->name }} Category <small>{{ $category->posts()->count() }} Posts</small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-block pull-right" style="margin-top: 20px;">Edit</a>
		</div>
		<div class="col-md-2" style="margin-top: 20px;">
			<form method="POST" action="{{ route('categories.destroy', $category->id) }}">
			    <input type="submit" value="Delete" class="btn btn-danger btn-block">
			    <input type="hidden" name="_token" value="{{ Session::token() }}">
			   {{ method_field('DELETE') }}
			</form>﻿
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($category->posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td> @foreach($post->tags as $tag)
								<span class="label label-default" style="margin-left: 5px;">{{ $tag->name }} </span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection