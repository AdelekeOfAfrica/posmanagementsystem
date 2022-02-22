<div class = "row">
    @forelse ($products_details as $product)
    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRO IMAGE</label>
            <img data-toggle = "modal" data-target = " #ProductPreview{{$product->id}}" src = "{{asset('product/images/'.$product->product_image)}}" width="90" alt="" style = "cursor:pointer;">      
            
        </div>
    </div>

    <div class = "col-md-12">
        <div class = "form-group">
            <img data-toggle = "modal" data-target = " #ProductPreview" src = "{{asset('product/barcodes/'.$product->barcode)}}" width="90" alt="" style = " position:absolute; left:85px; cursor:pointer;">      
            <label text="bold"  value = "" style =" position:absolute; left:115px; height:30px; top:10px;" readonly>{{$product->product_code}}</label>
        </div>
    </div>
    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRO NAME</label>
            <input type = "text" value = "{{$product->product_name}}" class = "form-control" readonly>
        </div>
    </div>

    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRO CODE</label>
            <input type = "text" value = "{{$product->product_code}}" class = "form-control" readonly>
        </div>
    </div>

    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRICE</label>
            <input type = "text" value = "{{$product->price}}" class = "form-control" readonly>
        </div>
    </div>

    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRO QTY</label>
            <input type = "text" value = "{{$product->quantity}}" class = "form-control" readonly>
        </div>
    </div>

    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRO STOCK</label>
            <input type = "text" value = "{{$product->alert_stock}}" class = "form-control" readonly>
        </div>
    </div>

    <div class = "col-md-12">
        <div class = "form-group">
            <label for="">PRO DESCRIPTION</label>
            <textarea  class = "form-control"  rows = "10" cols = "30">{{$product->description}}</textarea>
        </div>
    </div>
    @include('products.product_preview')
    @empty 
    @endforelse
</div>
