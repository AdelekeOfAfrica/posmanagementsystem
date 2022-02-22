<a href="#" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>&nbsp;
<a href="{{route ('users.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i> Users</a>&nbsp;
<a href="{{route ('products.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i> Products</a>&nbsp;
<a href="{{route('orders.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i> Orders</a>&nbsp;
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i> Transactions</a>&nbsp;
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i> Suppliers</a>&nbsp;
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i> customers</a> &nbsp;
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-car"></i> incoming</a> &nbsp;
<a href = "{{ route ('products.barcode')}}" class = "btn btn-outline rounded-pill"><i class="fa fa-barcode"></i> Barcodes</a>&nbsp;

<style>
    .btn-outline{
        border-color:#008b8b;
        color:#008b8b;
    }
    .btn-outline:hover{
        background:#008b8b;
        color:#fff;
    }
</style>