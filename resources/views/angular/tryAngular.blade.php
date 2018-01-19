@extends('main')

@section('title','| TryAngular')

@section('stylesheets')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
    <!--<script src= "{{ URL::asset('js/angular/calculator.js') }}"></script>-->
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div ng-app="">
                  <p>Name: <input type="text" ng-model="name"></p>
                  <p ng-bind="name"></p>
                </div>
                <div ng-app="CalculatorApp" ng-controller="CalculatorController">
				  <p><input type="number" ng-model="a"></p>
				  <p><input type="number" ng-model="b"></p>
				  <p><select ng-model="operator">
				        <option>+</option>
				        <option>*</option>
				        <option>-</option>
				        <option>/</option>
				        <p>{{ result() }}</p>
				     </select></p>

				</div>
            </div>
        </div>
@endsection

@section('scripts')
     <script src= "{{ URL::asset('js/angular/calculator.js') }}"></script>
@endsection



