@extends('layout')
@section('content')

    <div class="container"></div>
    <div class="col-md-10">
        <canvas class="mt-5" id="titles" data-salaries = '{{ json_encode($highest_salaries) }}'
                data-titles = '{{ json_encode($titles) }}'></canvas>
    </div>
    <div class="ml-4 mt-3">
        <a href="/dept_salary" class="btn btn-success ml-5">Salary according departments</a>
        <a href="/show_fluidity" class="btn btn-success ml-5">Fluidity</a>
    </div>
@endsection