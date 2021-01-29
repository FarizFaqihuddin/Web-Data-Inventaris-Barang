<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Employee Name</th>
            <th>Email</th>
            <th>NIK</th>
            <th>Position</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Product Name</th>
            <th>Stock</th>
            <th>Specification</th>
            <th>Condition</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($mutations as $mutation)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mutation->employee['name'] }}</td>
            <td>{{ $mutation->employee['email'] }}</td>
            <td>{{ $mutation->employee['nik'] }}</td>
            <td>{{ $mutation->employee['position'] }}</td>
            <td>{{ $mutation->item->category['name'] }}</td>
            <td>{{ $mutation->item->brand['name'] }}</td>
            <td>{{ $mutation->item['name'] }}</td>
            <td>{{ $mutation->item['stock'] }}</td>
            <td>{{ $mutation->item['specification'] }}</td>
            <td>{{ $mutation->item['condition'] }}</td>
            <td>{{ $mutation->item['location'] }}</td>
            <td>{{ $mutation->item['status'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>