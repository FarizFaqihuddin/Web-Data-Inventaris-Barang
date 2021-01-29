@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
		
				<div>
					<img style="width:40%; display: block; margin: auto;" class="img-responsive" src="{{url('uploads/receipts/'.$data->receipt)}}"><br/>
				</div>

				<div class="form-row">
                    <div class="form-group col-md-6">
						<label class="control-label">Invoice number :</label>
						<input class="form-control" placeholder="{{ $data->invoice_number }}" readonly>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label">Purchase Date :</label>
						<input class="form-control" placeholder="{{ $data->purchase_date }}" readonly>
					</div>			
				</div>		
                
                <div>
                    <label class="control-label">Total Price :</label>
                    <input class="form-control" placeholder="{{ $data->total_price }}" readonly>
                </div>
            </div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
                <table class="table table-hover table-light">
                    <thead>
                    <tr>
                        <th width="30%">Product</th>
                        <th width="20%">Category</th>
                        <th width="20%">Brand</th>
                        <th width="10%">Qty</th>
                        <th width="15%">Price</th>
                    </tr>
                    </thead>
                    <tbody id="detail">
                    @if(!empty($data->purchaseItems))
                        @foreach($data->purchaseItems as $detail)
                        {{-- @php
                        $subtotal = @$detail->qty * @$detail->price;
                        @$total += $subtotal;
                        @endphp --}}
                        <tr>
                        <td width="30%">
                            <div class="form-group form-md-line-input has-success">
                                <input style="border-color: #e7e7e7!important;" class="form-control" value="{{@$detail->item->name}}" readonly>
                            </div>
                        </td>
                        <td  width="20%">
                            <div class="form-group form-md-line-input has-success">
                                <input style="border-color: #e7e7e7!important;" class="form-control category" type="text" name="category[]" value="{{@$detail->item->category->name}}" readonly>
                            </div>
                        </td>
                        <td  width="20%">
                            <div class="form-group form-md-line-input has-success">
                                <input style="border-color: #e7e7e7!important;" class="form-control" value="{{@$detail->item->brand->name}}" readonly>
                            </div>
                        </td>
                        <td  width="10%">
                            <div class="form-group form-md-line-input has-success">
                                <input style="border-color: #e7e7e7!important;" class="form-control qty" type="number" name="amount_purchased[]" value="{{ @$detail->amount_purchased }}" readonly>
                            </div>
                        </td>
                        <td width="15%">
                            <div class="form-group form-md-line-input has-success">
                                <input style="border-color: #e7e7e7!important;" class="form-control price" type="text" name="price[]" value="{{ @$detail->price }}" readonly>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
		</div>
	</div>
</div>
<button class="btn btn-primary print" onclick="window.print()"><i class="ti-printer"></i> Print</button>
<a href="{{ url('/'.$view) }}" class="btn btn-danger"> Cancel </a>
@endsection