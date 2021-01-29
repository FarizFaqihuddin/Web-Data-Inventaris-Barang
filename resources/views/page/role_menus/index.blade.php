@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route($view.'.create') }}" class="btn btn-primary pull-right btn-rounded"> <i class="fa fa-plus"></i> Add New</a>
                <h4 class="card-title">Data {{$title}}</h4>
                <h6 class="card-subtitle">Manajemen Data {{$title}}</h6>
                
                <div class="table-responsive">
                    <table id="datatable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Role</th>
                              <th>Menu</th>
                             
                              <th>Aksi</th>
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
