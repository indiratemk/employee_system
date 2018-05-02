<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css?v=2">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
    <title>Employees</title>
</head>
<body>

<div class="container">
    <div class="w-80 mb-3 content">
        <nav class="navbar navbar-inverse bg-inverse rounded-top">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('show_fluidity') }}" class="btn btn-success my-2 my-sm-2">Show Statistics</a>
                </div>
                <div class="col-md-4">
                    <form action="GET" id="searchForm" class="form-inline">
                        <input name="name" id="name" class="form-control mr-sm-2 ml-4" type="text" placeholder="Search">
                        <button class="btn btn-success my-2 my-sm-2 btn-search">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar navbar-light bg-faded">
                    @foreach($departments as $department)
                        {{--<a class="navbar-brand p-3" href="{{ route('show_by_department', $department->dept_no) }}"--}}
                           {{-->{{ $department->dept_name }}</a>--}}
                    <a class="navbar-brand p-3 dept-button" data-department="{{ $department->dept_no }}" role="button">{{ $department->dept_name }}</a>
                    @endforeach
                </nav>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="/js/employees.js?1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="/js/dept_salary.js?2"></script>
<script src="/js/highest_salary.js?3"></script>
<script src="/js/fluidity.js?1"></script>
</body>
</html>