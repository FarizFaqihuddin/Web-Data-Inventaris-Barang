@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data {{$title}}</h4>
                <h6 class="card-subtitle">Manajemen Data {{$title}}</h6>

            <div class="portlet-body">
                <form method="post" action="{{ url('/'.$view.'/'.$data->id) }}" enctype="multipart/form-data">
                    {{ method_field('PUT')}}
                    {{ csrf_field() }}
                    @include('page.'.$view.'.field')
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
