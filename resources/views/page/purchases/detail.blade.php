<tr>
    <td width="30%">
        <div class="form-group form-md-line-input has-success">
            {!! Template::selectbox(['' => ' - Choose Product - '] + $listItem->toArray(), @$detail->item_id, "item_id[]", ["class" => "form-control item_id"]) !!}
        </div>
    </td>
    <td  width="20%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="brand[]" class="form-control brand">
        </div>
    </td>
    <td  width="20%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="category[]" class="form-control category">
        </div>
    </td>
    <td  width="10%">
        <div class="form-group form-md-line-input has-success">
            <input type="number" name="amount_purchased[]" class="form-control qty" value="{{ @$amount_purchased->qty }}">
        </div>
    </td>
    <td width="15%">
        <div class="form-group form-md-line-input has-success">
            <input type="text" name="price[]" class="form-control price" value="{{ @$detail->price }}" min="1">
        </div>
    </td>
    <td width="5%"><a class="hapus" title="Delete Record" id=""><i class="fa fa-trash-o"></i></a></td>
</tr>
