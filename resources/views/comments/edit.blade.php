@extends('main')

@section('title', '| Post Comment')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:10px">
			<h1 align="center" style="margin-bottom: 20px;">Edit Comment</h1>
			<form method="POST" action="{{ route('comments.update',$comment->id) }}">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					        <label name="name">Name:</label>
					        <input id="name" name="name" class="form-control" disabled="" value="{{ $comment->name }}">
					      </div>
					</div>
					<div class="col-md-6">
					      <div class="form-group">
					        <label name="email">Email:</label>
					        <input id="email" name="email" class="form-control" disabled="" value="{{ $comment->email }}">
					      </div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
					        <label name="comment">Comment:</label>
					        <textarea id="comment" name="comment" rows="5" class="form-control" required>{{ $comment->comment }}</textarea>
					      </div>
					</div>
				</div>
		      <input type="submit" value="Update" class="btn btn-success btn-lg btn-block">
		      <input type="hidden" name="_token" value="{{ Session::token() }}">
	              {{ method_field('PUT') }}
		    </form>
		</div>
	</div>

@endsection