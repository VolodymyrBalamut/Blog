@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title',"| $titleTag")

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->title }}</h1>
			<p>{{ $post->body }}</p>
			<hr>
			<p>Posted in: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="comments-icon"><i class="fas fa-comment"></i></span>{{ $post->comments->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=mm" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F nS, Y - G:i',strtotime($comment->created_at)) }}</p>
						</div>	
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>		
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:50px">
			<form method="POST" action="{{ route('comments.store',$post->id) }}" data-parsley-validate="">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					        <label name="name">Name:</label>
					        <input id="name" name="name" class="form-control" required="" maxlength="255">
					      </div>
					</div>
					<div class="col-md-6">
					      <div class="form-group">
					        <label name="email">Email:</label>
					        <input id="email" name="email" class="form-control" required="" maxlength="255" minlength="5">
					      </div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
					        <label name="comment">Comment:</label>
					        <textarea id="comment" name="comment" rows="5" class="form-control" required=""></textarea>
					      </div>
					</div>
				</div>
		      <input type="submit" value="Add Comment" class="btn btn-success btn-lg btn-block">
		      <input type="hidden" name="_token" value="{{ Session::token() }}">
		    </form>
		</div>
	</div>


@endsection

@section("scripts")
	<!--<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>-->
	<script  src="{{ URL::asset('js/fontawesome-all.min.js') }}" type="text/javascript"></script>
@endsection