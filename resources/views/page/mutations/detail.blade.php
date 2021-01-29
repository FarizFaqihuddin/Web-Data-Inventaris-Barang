<tr>
    <td width="20%">
        <div class="form-group form-md-line-input has-success">
            {!! Template::selectbox(['' => ' - Choose Product - '] + $listItem->toArray(), @$detail->item_id, "item_id[]", ["class" => "form-control item_id"]) !!}
        </div>
    </td>
    <td  width="15%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="category[]" class="form-control category" >
        </div>
    </td>
    <td  width="15%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="brand[]" class="form-control brand" >
        </div>
    </td>
    <!-- <td  width="10%">
        <div class="form-group form-md-line-input has-success">
            <input type="number" name="stock[]" class="form-control" value="{{ @$detail->item->stock}}">
        </div>
    </td> -->
    <td  width="10%">
        <div class="form-group form-md-line-input has-success">
            <input type="number" name="amount_item[]" class="form-control qty" min="1">
        </div>
    </td>
    <td width="15%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="mutation_status[]" class="form-control mutation_status" >
        </div>
    </td>
    <td width="20%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="information[]" class="form-control information" >
        </div>
    </td>
    <td width="5%"><a class="hapus" title="Delete Record" id=""><i class="fa fa-trash-o"></i></a></td>
</tr>