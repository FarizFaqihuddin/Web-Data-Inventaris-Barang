<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Employee Name</th>
            <th>Email</th>
            <th>NIK</th>
            <th>Position</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($employees as $employee)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email}}</td>
            <td>{{ $employee->nik }}</td>
            <td>{{ $employee->position }}</td>
        </tr>
    @endforeach
    </tbody>
</table>