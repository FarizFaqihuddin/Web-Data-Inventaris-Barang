@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data {{$title}}</h4>
                <h6 class="card-subtitle">Manajemen Data {{$title}}</h6>

                <form method="post" action="{{ route('role_menus.store') }}" enctype="multipart/form-data" class="m-form">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{request()->route('id')}}" name="role_id">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="m-form__group form-group">
                            @if(!empty($menus))
                            @foreach($menus as $menu)
                            @if(!empty($menu->url))
                            <div class="m-checkbox-list">
                                <label class="m-checkbox m-checkbox--state-success">
                                    <input type="checkbox" name="menu_id[]" {{ (array_key_exists($menu->id, $list_role_menu) ? 'checked' : ' asdfsafdsad') }} value="{{ $menu->id }}">
                                    <strong>{{ $menu->name }}</strong>
                                    <span></span>
                                </label>
                            </div>
                            @else
                                <label><strong>{{ $menu['head'] }}</strong></label>
                                <div class="m-checkbox-list">
                                @foreach($menu['detail'] as $det)
                                <label class="m-checkbox m-checkbox--state-success">
                                    <input type="checkbox" name="menu_id[]" {{ (array_key_exists($det->id, $list_role_menu) ? 'checked' : '') }} value="{{ $det->id }}">
                                    {{ $det->name }}
                                    <span></span>
                                </label>
                                @endforeach
                                </div>
                            @endif
                            @endforeach
                            @endif
                            </div>


                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ url('/'.$view) }}" class="btn btn-danger"> Cancel </a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
