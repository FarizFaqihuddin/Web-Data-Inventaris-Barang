<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Employee Name</th>
            <th>NIK</th>
            <th>Product Name</th>
            <th>Amount Item</th>
            <th>Mutation Status</th>
            <th>Information</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($mutations as $mutation)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mutation->employee['name'] }}</td>
            <td>{{ $mutation->employee['nik'] }}</td>
            <td>{{ $mutation->item['name'] }}</td>
            <td>{{ $mutation->amount_item }}</td>
            <td>{{ $mutation->mutation_status }}</td>
            <td>{{ $mutation->information }}</td>
        </tr>
    @endforeach
    </tbody>
</table>