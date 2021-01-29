@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
		
			<div class="form-row">
				<div class="form-group col-md-6">
				<br>
					<img style="width:45%; display: block; margin: auto;" class="img-responsive" src="{{url('uploads/items/'.$data->picture)}}"><br/>
				</div>

				<div class="form-group col-md-6">
					<div>
						<label class="control-label">Category :</label>
						<input class="form-control" placeholder="{{ $data->category['name'] }}" readonly>
					</div>
					<div>
						<label class="control-label">Brand :</label>
						<input class="form-control" placeholder="{{ $data->brand['name'] }}" readonly>
					</div>			
					<div>
						<label class="control-label">Name :</label>
						<input class="form-control" placeholder="{{ $data->name }}" readonly>
					</div>
					<div>
						<label class="control-label">Specification :</label>
						<input class="form-control" placeholder="{{ $data->specification }}" readonly>
					</div>
				</div>		

			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label class="control-label">Stock :</label>
					<input class="form-control" placeholder="{{ $data->stock }}" readonly>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Condition :</label>
					<input class="form-control" placeholder="{{ $data->condition }}" readonly>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label class="control-label">Status :</label>
					<input class="form-control" placeholder="{{ $data->status }}" readonly>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Location :</label>
					<input class="form-control" placeholder="{{ $data->location }}" readonly>
				</div>
			</div>

			</div>
		</div>
	</div>
</div>
<button class="btn btn-primary print" onclick="window.print()"><i class="ti-printer"></i> Print</button>
<a href="{{ url('/'.$view) }}" class="btn btn-danger"> Cancel </a>
@endsection