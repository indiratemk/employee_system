<table class="table table-striped mt-3 ml-4">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <th scope="row">{{ $employee->emp_no }}</th>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td><a class="more" href="{{ route('show', $employee->emp_no) }}">show detailes</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $employees->links() }}