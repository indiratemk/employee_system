@extends('layout')
@section('content')

    <div class="container"></div>
    <div class="col-md-10">
    <canvas class="mt-5" id="myChart"
            data-departments = '{{ json_encode($departments) }}'></canvas>
    </div>
    <div class="ml-4 mt-3">
        <a href="/show_fluidity" class="btn btn-success ml-5">Fluidity</a>
        <a href="/highest_sal" class="btn btn-success ml-5">Salary according titles</a>
    </div>
@endsection

{{--data-salaries = '{{ json_encode($salaries) }}'--}}