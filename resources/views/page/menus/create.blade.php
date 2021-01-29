@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data {{$title}}</h4>
                <h6 class="card-subtitle">Manajemen Data {{$title}}</h6>

            <div class="portlet-body">
                <form method="post" action="{{ route($view.'.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('page.'.$view.'.field')
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
