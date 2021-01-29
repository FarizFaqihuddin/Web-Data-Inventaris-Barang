@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route($view.'.create') }}" class="btn btn-primary pull-right btn-rounded"> <i class="fa fa-plus"></i> Add New</a>
                <h4 class="card-title">Data {{$title}}</h4>
                <h6 class="card-subtitle">Manajemen Data {{$title}}</h6>
                <div class="dt-buttons">
					<a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example23" href="mutations/excel"><i class="ti-download"></i> Laporan</a>
                </div>
                
                <div class="table-responsive m-t-40">
                    <table id="datatable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
