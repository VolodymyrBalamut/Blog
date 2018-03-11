@extends('main')

@section('title','| All Clips')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Clips</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('clips.create') }}" class="btn btn-primary btn-block btn-lg btn-h1-spacing">Add New Clip</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Url</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($clips as $clip)
						<tr>
							<th>{{ $clip->id}}</th>
							<td>{{$clip->name}}</td>
							<td>{{substr(strip_tags($clip->url),0,50)}}{{ strlen(strip_tags($clip->url))>50 ? "..." : ""}}</td>
							<td>{{date("M j, Y",strtotime($clip->created_at))}}</td>
							<td><a href="{{ route('clips.show', $clip->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('clips.edit', $clip->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $clips->links() }}
			</div>
		</div>
	</div>
@endsection