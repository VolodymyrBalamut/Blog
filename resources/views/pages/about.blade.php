@extends('main')

@section('title','| About')

@section('content')
        <div class="row">
            <div class="col-md-12">
              <h1>About Me!</h1>
               <p>
                My number: {{$data["telephone"]}} </br>
                My email: {{$data["email"]}}
                </p>
            </div>
        </div>
@endsection
