@extends('layouts.app')
@section('content')
@livewire('products') 


<!-- modal section-->
<div class="modal right fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Add Product </h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form  Action="{{route ('products.store') }}" Method="POST" enctype = "multipart/form-data" autocomplete = "off">
                @csrf
                <div class="form-group">
                    <label for="name">Product_name</label>
                    <input type="text" name="product_name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Product_image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Product_code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand">
                </div>
                <div class="form-group">
                    <label for="name">Alert_Price</label>
                    <input type="number" name="price" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="number" name="quantity" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Alert_Stock</label>
                    <input type="number" name="alert_stock" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rol="30" col="30" placeholder="decscribe your product" id=""  class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block">Save Product</button>
                </div>
         </form>   
      </div>
    </div>
  </div>
</div>




<style>
  #search{
      position:fixed;
      top:81px;
      right:-650px;
  }  
  .modal.right .modal-dialog{
      position:absolute;
      top:0px;
      right:0px;
      margin-right:20vh;
  }
  .modal.fade:not(.in).left .modal-dialog{
      -webkit-transform:translate3d(50%,0,0);
      transform:translate3d(50%,0,0);
  }
</style>

@endsection
 