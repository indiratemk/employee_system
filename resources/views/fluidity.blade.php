@extends('layout')
@section('content')

    <div class="container"></div>
    <div class="col-md-5 mt-4">
        <select class="selectpicker" id="selection">
            <option selected="true" disabled="disabled">Choose department...</option>
        @foreach($departments as $department)
            <option data-dept="{{ $department->dept_no }}">{{ $department->dept_name }}</option>
        @endforeach
        </select>

    </div>
    <div class="col-md-10" id="graphBlock">
        @include('include.graph')
    </div>
    <div class="ml-4 mt-3">
    <a href="/dept_salary" class="btn btn-success ml-5">Salary according departments</a>
    <a href="/highest_sal" class="btn btn-success ml-5">Salary according titles</a>
    </div>
@endsection