@extends('main')

@section('title','| Contact')

@section('content')
        <div class="row">
            <div class="col-md-12">
              <h1>Contact Me!</h1>
              <form action="{{ url("contact") }}" autocomplete="off" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label> 
                    <input id="subject" name="subject" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label name="message">Body:</label>
                    <textarea id="message" name="message" class="form-control" required>Type your text here...</textarea> 
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">
              </form>
            </div>
        </div>
@endsection