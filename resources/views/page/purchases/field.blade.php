<div class="row">
    <div class="col-md-6 ">
        <div class="form-body form-group form-md-line-input">
            <label>Invoice number</label>
            <input class="form-control" type="text" name="invoice_number" value="{{ @$data->invoice_number }}">
        </div>
        <div class="form-body form-group form-md-line-input">
            <label>Purchase Date</label>
            <input class="form-control" type="date" name="purchase_date" value="{{ @$data->purchase_date }}">
        </div>
        <div class="form-body form-group form-md-line-input">
            <label>Total Price</label>            
            <input class="form-control" type="text" name="total_price" value="{{ @$data->total_price }}">
        </div>
        <div class="form-body form-group form-md-line-input">
            <label>Receipt</label>
            <input class="form-control" type="file" name="receipt" value="{{ @$data->receipt }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Input Detail Transaksi {{$title}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" id="add_row"><i class="fa fa-plus"></i> Add</a><br><br>
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th width="30%">Product</th>
                                <th width="20%">Category</th>
                                <th width="20%">Brand</th>
                                <th width="10%">Qty</th>
                                <th width="15%">Price</th>
                                <th width="5%">Action</th>
                            </tr>
                            </thead>
                            <tbody id="detail">
                            @if(!empty($data->purchaseItems))
                                @foreach($data->purchaseItems as $detail)
                                {{-- @php
                                $subtotal = @$detail->qty * @$detail->price;
                                @$total += $subtotal;
                                @endphp --}}
                                <tr>
                                <td width="30%">
                                    <div class="form-group form-md-line-input has-success">
                                        {!! Template::selectbox(['' => ' - Choose Product - '] + $listItem->toArray(), @$detail->item_id, "item_id[]", ["class" => "form-control item_id"]) !!}
                                    </div>
                                </td>
                                <td  width="20%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input type="text" name="category[]" class="form-control category" value="{{@$detail->item->category->name}}">
                                    </div>
                                </td>
                                <td  width="20%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input type="text" name="brand[]" class="form-control brand" value="{{@$detail->item->brand->name}}">
                                    </div>
                                </td>
                                <td  width="10%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input type="number" name="amount_purchased[]" class="form-control qty" value="{{ @$detail->amount_purchased }}" min="1">
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-group form-md-line-input has-success">
                                        <input type="text" name="price[]" class="form-control price" value="{{ @$detail->price }}">
                                    </div>
                                </td>
                                <td width="5%"><a class="hapus" title="Delete Record" id=""><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="btn green" type="submit"><i class="ti-save"></i> Save</button>
<a href="{{ url('/'.$view) }}" class="btn red"> Cancel </a>

@section('js')
<script>
$(document).ready(function() {
    grandtotal();
    $("body").on('change','.item_id', function(){
        var index       = $(this).index(".item_id");
        var item_id     = $(this).val();
        $( ".brand" ).eq(index).val();
        $( ".brand" ).eq(index).val();
        if(item_id > 0)
        {
            var url = "{{ url('api/item/get') }}"+"/"+item_id;
            $.get( url, function( data ) {
                console.log(data);
                if(data.brand){
                    $(".brand").eq(index).val(data.brand.name);   
                }
                if(data.category){
                    $(".category").eq(index).val(data.category.name);   
                }
            }, "json" );
        }
        subtotal(index);
    });

    $("body").on('click','.hapus', function(){
        $('.hapus').eq($(this).index()).parent().parent().remove();
        total();
    });

    $("body").on('keyup','.qty', function(){
        var index       = $(this).index(".qty");
        subtotal(index);
    }); 
    $("body").on('keyup','#diskon', function(){
        grandtotal();
    });

    function subtotal(index){
        var qty     = $(".qty").eq(index).val();
        var price   = $(".price").eq(index).val();
        $(".subtotal").eq(index).val(qty * price);
        total();
    }

    function total(){
        var sum = 0;
        $('.subtotal').each(function(){
            sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
        });
        $('.total').val(sum);
        grandtotal();
    }


    function grandtotal(){
        var disc        = $("#diskon").val();
        var total       = $(".total").val();
        var grandtotal  = total - disc;
        $(".grandtotal").val(grandtotal);
    }

    $("#add_row").click(function(){
        var url = "{{ url('purchases/detail') }}";
        $.get( url, function( data ) {
            $("#detail").append( data );
            $('select').select2();
        });
        
    })
});
</script>
@endsection
