@extends('main')

@section('title','| View Clip')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $clip->name }}</h1>
			<p class="lead" id="url" hidden="">{{ $clip->url }}</p>
			<div id="countView" class="views"> перегляди</div>

			<iframe width="420" height="315"
				src="{{ 'https://www.youtube.com/embed/'.$clip->url }}" allowfullscreen>
			</iframe>	
			
			<div class="views">
				<span id="countLike"> <i class="fas fa-thumbs-up"></i></span>
				<span id="countDislike"> <i class="fas fa-thumbs-down"></i></span>
			</div>
			
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y H:i',strtotime($clip->created_at)) }}</p>
				</dl>
				
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y H:i',strtotime($clip->updated_at)) }}</p>
				</dl>
				<hr>
			</div>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('clips.edit', $clip->id) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						<form method="POST" action="{{ route('clips.destroy', $clip->id) }}">
						    <input type="submit" value="Delete" class="btn btn-danger btn-block">
						    <input type="hidden" name="_token" value="{{ Session::token() }}">
						   {{ method_field('DELETE') }}
						</form>﻿
					</div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <br>
				    <a href="{{ route('clips.index') }}" class="btn btn-default btn-block">Show all Clips</a>
				  </div>
				</div><!-- /.row -->﻿
			</div>
		</div>
	</div>
@endsection

@section("scripts")
	<!--<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>-->
	<script  src="{{ URL::asset('js/fontawesome-all.min.js') }}" type="text/javascript"></script>

	<script type="text/javascript">
		$(function(){
			$.ajax({
				type:"GET",
				url:"https://www.googleapis.com/youtube/v3/videos",
				data:{
					id: '{!! $clip->url !!}',
					key: 'AIzaSyBwVFsBBeaHY6AJLEiKjzJSan22jEaa7lQ',
					part: 'snippet,contentDetails,statistics,status'
				},
				success:function(data){
					let clip = data.items[0];
					console.log('success',clip);
					$('#countView').prepend(clip.statistics.viewCount);
					$('#countLike').prepend(clip.statistics.likeCount);
					$('#countDislike').prepend(clip.statistics.dislikeCount);
				}
			});
			
		});
	</script>
@endsection
