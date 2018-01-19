@extends('main')

@section('title','| View Record')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Вправа: {{ $record->exercise }}</h1>
			<h2>Рекорд: {{ $record->value }}</p>
			<hr>
			<h3>95% : {{ floor ($record->value * 0.95) }} {{ $record->unit }}</h3>
			<h3>90% : {{ floor ($record->value * 0.90) }} {{ $record->unit }}</h3>
			<h3>85% : {{ floor ($record->value * 0.85) }} {{ $record->unit }}</h3>
			<h3>80% : {{ floor ($record->value * 0.80) }} {{ $record->unit }}</h3>
			<h3>70% : {{ floor ($record->value * 0.70) }} {{ $record->unit }}</h3>
			<h3>60% : {{ floor ($record->value * 0.60) }} {{ $record->unit }}</h3>
			<h3>50% : {{ floor ($record->value * 0.50) }} {{ $record->unit }}</h3>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y H:i',strtotime($record->created_at)) }}</dd>
				</dl>
				
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y H:i',strtotime($record->updated_at)) }}</dd>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('records.edit', $record->id) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						<form method="POST" action="{{ route('records.destroy', $record->id) }}">
						    <input type="submit" value="Delete" class="btn btn-danger btn-block">
						    <input type="hidden" name="_token" value="{{ Session::token() }}">
						   {{ method_field('DELETE') }}
						</form>﻿
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection