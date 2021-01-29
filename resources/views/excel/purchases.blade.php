<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Total Price</th>
            <th>Receipt</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($purchases as $purchase)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $purchase->invoice_number }}</td>
            <td>{{ $purchase->purchase_date }}</td>
            <td>{{ $purchase->total_price }}</td>
            <td>{{ $purchase->receipt }}</td>
        </tr>
    @endforeach
    </tbody>
</table>