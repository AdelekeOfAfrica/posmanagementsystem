<table class="table table-bordered table-left">
<thead>
    <tr>
        <th>ID</th>
        <th>Product_name</th>
        <th>Brand</th>
        <th>Price</th> 
        <th>Quantity</th>
        <th>Alert_stock</th> 
        <th>Actions</th> 
        
    </tr>
</thead>
<tbody>
    @foreach($products as $key=>$product)
        <tr>
            <td>{{$key +1}}</td>
            <td  style = "cursor:pointer;" data-toggle = "tooltip" 
            data-placement = "right" title = "click to view Details"
             wire:click ="ProductDetails({{ $product->id }})">{{$product->product_name}}</td>

            <td>{{$product->brand}}</td>
            <td>{{number_format($product->price,2)}}</td>
            <td>{{$product->quantity}}</td>
            <td>@if ($product->alert_stock >= $product->quantity) <span class="badge badge-danger"> Low Stock < {{$product->alert_stock}}
                @else <span class="badge badge-success">{{$product->alert_stock}}</span>
                </span>
                @endif
            </td>
            
            <td>
                <div class="form-group">
                    <a href="#" data-toggle="modal" data-target="#editUser{{$product->id}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Edit</a>
                    <a href="#" data-toggle="modal" data-target="#deleteUser{{$product->id}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</a>
                </div>
            </td>
        </tr>
        @include('Products.edit')
        <!-- edit user modal-->
        
        <!-- delete modal-->
        @include('products.delete')
        <!-- end of delete modal-->
        <!--{$products->links()}}-->
    @endforeach     
    </tbody>

</table>