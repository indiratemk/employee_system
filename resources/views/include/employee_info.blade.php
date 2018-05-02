<h3 class="ml-3">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
@if(!empty($manager))
    <p class="ml-3">was manager of {{ $manager->dept_name }} department from {{ $manager->from_date }} to {{ $manager->to_date }} </p>
@endif
<div class="col-md-11">
    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Department</th>
            <th scope="col">Position</th>
            <th scope="col">Salary</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salaries as $salary)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $salary->dept }}</td>
                <td>{{ $salary->title }}</td>
                <td>{{ $salary->salary }}</td>
                <td>{{ $salary->from_date }}</td>
                <td>{{ $salary->to_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>