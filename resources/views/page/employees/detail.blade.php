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
<button class="btn btn-primary print" onclick="window.print()"><i class="ti-printer"></i> Print</button>
<a href="{{ url('/'.$view) }}" class="btn btn-danger"> Cancel </a>
@endsection