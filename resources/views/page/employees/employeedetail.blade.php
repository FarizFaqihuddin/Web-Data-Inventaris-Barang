@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">

				<div class="form-row">
                    <div class="form-group col-md-6">
						<label class="control-label">Name :</label>
						<input class="form-control" placeholder="{{ $data->name }}" readonly>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label">Email :</label>
						<input class="form-control" placeholder="{{ $data->email }}" readonly>
					</div>			
				</div>
                <div class="form-row">
                    <div class="form-group col-md-6">
						<label class="control-label">NIK :</label>
						<input class="form-control" placeholder="{{ $data->nik }}" readonly>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label">Position :</label>
						<input class="form-control" placeholder="{{ $data->position }}" readonly>
					</div>			
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
                        <th width="15%">Product</th>
                        <th width="15%">Category</th>
                        <th width="15%">Brand</th>
                        <th width="10%">Qty</th>
                        <th width="15%">Mutation Status</th>
                        <th width="25%">Information</th>
                    </tr>
                    </thead>
                    <tbody id="detail">
                    @if(!empty($data->mutations))
                        @foreach($data->mutations as $detail)
                        {{-- @php
                        $subtotal = @$detail->qty * @$detail->mutation_status;
                        @$total -= $subtotal;
                        @endphp --}}
                        <tr>
                                <td width="15%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input style="border-color: #e7e7e7!important;" class="form-control" value="{{@$detail->item->name}}" readonly>
                                    </div>
                                </td>
                                <td  width="15%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input style="border-color: #e7e7e7!important;" class="form-control category" type="text" name="category[]" value="{{@$detail->item->category->name}}" readonly>
                                    </div>
                                </td>
                                <td  width="15%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input style="border-color: #e7e7e7!important;" class="form-control brand" type="text" name="brand[]" value="{{@$detail->item->brand->name}}" readonly>
                                    </div>
                                </td>
                                <td  width="10%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input style="border-color: #e7e7e7!important;" class="form-control qty" type="number" name="amount_item[]" value="{{ @$detail->amount_item }}" readonly>
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input style="border-color: #e7e7e7!important;" class="form-control mutation_status" type="text" name="mutation_status[]" value="{{ @$detail->mutation_status }}" readonly>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input style="border-color: #e7e7e7!important;" class="form-control information" type="text" name="information[]" value="{{ @$detail->information }}" readonly>
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
<a href="{{ url('/mutations') }}" class="btn btn-danger"> Cancel </a>
@endsection