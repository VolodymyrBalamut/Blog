@extends('main')

@section('title','| View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<img src="{{ asset('images/'.$post->image) }}" height="400"/>
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			<hr>
			<div class="tag">
				@foreach($post->tags as $tag)
					<a href="{{ route("tags.show", $tag->id) }}"><span class="label label-default">{{ $tag->name }}</span></a>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px;"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL:</label>
					<p><a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</p>
				</dl>
				
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						<form method="POST" action="{{ route('posts.destroy', $post->id) }}">
						    <input type="submit" value="Delete" class="btn btn-danger btn-block">
						    <input type="hidden" name="_token" value="{{ Session::token() }}">
						   {{ method_field('DELETE') }}
						</form>﻿
					</div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <br>
				    <a href="{{ route('posts.index') }}" class="btn btn-default btn-block">Show all Posts</a>
				  </div>
				</div><!-- /.row -->﻿
			</div>
		</div>
	</div>
@endsection

@section("scripts")
	<!--<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>-->
	<script  src="{{ URL::asset('js/fontawesome-all.min.js') }}" type="text/javascript"></script>
@endsection
