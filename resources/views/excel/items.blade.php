<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Product Name</th>
            <th>Specification</th>
            <th>Condition</th>
            <th>Picture</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($items as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->category['name'] }}</td>
            <td>{{ $item->brand['name'] }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->specification }}</td>
            <td>{{ $item->condition }}</td>
            <td>{{ $item->picture }}</td>
            <td>{{ $item->stock }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->location }}</td>
        </tr>
    @endforeach
    </tbody>
</table>