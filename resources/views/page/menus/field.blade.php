<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Menu</label>
            {!! Template::selectbox(['0'=>' - Pilih Menu - '] + $listMenus->toArray(),@$data->parent_id,"parent_id",["class" => "form-control"]) !!}
            
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            
        </div>
        <div class="form-body form-group">
            <label>URL</label>
            <input class="form-control" type="text" name="url" value="{{ @$data->url }}">
            
        </div>
        <div class="form-body form-group">
            <label>Icon</label>
            <input class="form-control" type="text" name="icon" id="icon" value="{{ @$data->icon }}">
            
            <div class="input-icon right">
                <i id="show_icon" class=""></i>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary" type="submit"><i class="ti-save"></i> Save</button>
<a href="{{ url('/'.$view) }}" class="btn btn-red"> Cancel </a>
@section('js')
<script>
$("#icon").keyup(function(){
    $("#show_icon").attr("class", $(this).val());
});
$("#icon").keyup();
</script>
@endsection
