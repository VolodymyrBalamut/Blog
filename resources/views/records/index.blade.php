@extends('main')

@section('title','| All Records')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Records</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('records.create') }}" class="btn btn-primary btn-block btn-lg btn-h1-spacing">Add Record</a>
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
					<th>Exercise</th>
					<th>Value</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($records as $record)
						<tr>
							<th>{{ $record->id}}</th>
							<td>{{$record->exercise}}</td>
							<td>{{$record->value}} {{ $record->unit }}</td>
							<td>{{date("M j, Y",strtotime($record->created_at))}}</td>
							<td><a href="{{ route('records.show', $record->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('records.edit', $record->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="text-center">
				{{ $records->links() }}
			</div>
		</div>
	</div>
@endsection