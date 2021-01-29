<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Category</label>
            {!! Template::selectbox([''=>' - Pilih Category - '] + $listCategory->toArray(),@$data->category_id,"category_id",["class" => "form-control"]) !!}
            
        </div>
		<div class="form-group">
            <label>Brand</label>
            {!! Template::selectbox([''=>' - Pilih Brand - '] + $listBrand->toArray(),@$data->brand_id,"brand_id",["class" => "form-control"]) !!}
            
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            
        </div>
        <div class="form-body form-group">
            <label>Specification</label>
            <input class="form-control" type="text" name="specification" value="{{ @$data->specification }}">
            
        </div>
        <div class="form-body form-group">
            <label>Condition</label>
            <input class="form-control" type="text" name="condition" value="{{ @$data->condition }}">
            
        </div>
		<div class="form-body form-group dropzone">
            <label>Picture</label>
            <input class="form-control" type="file" name="picture" value="{{ @$data->picture }}">
            
        </div>
		<div class="form-body form-group">
            <label>Stock</label>
            <input class="form-control" type="text" name="stock" value="{{ @$data->stock }}">
            
        </div>
		<div class="form-body form-group">
            <label>Status</label>
            <input class="form-control" type="text" name="status" value="{{ @$data->status }}">
            
        </div>
		<div class="form-body form-group">
            <label>Location</label>
            <input class="form-control" type="text" name="location" value="{{ @$data->location }}">
            
        </div>
    </div>
</div>
<button class="btn btn-primary" type="submit"><i class="ti-save"></i> Save</button>
<a href="{{ url('/'.$view) }}" class="btn btn-red"> Cancel </a>