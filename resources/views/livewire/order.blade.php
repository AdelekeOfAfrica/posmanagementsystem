<div class="col-lg-12">
        <div class="row">
            <div class="col-md-8">
             <div class="card">
               <div class="card-header">
                   <h4 style="float:left;">Order Products </h4>
                   <a href="#" style="float:right;" class=" btn btn-default" 
                   data-toggle="modal" data-target="#addProduct">
                   <i class="fa fa-plus"></i> Order  Product</a>
                </div>
                <!--<form action="{{ route('orders.store') }}" method="POST"></form>
                    @csrf-->
                    <div class="card-body">
                        <div class ="form-group">
                            <form wire:submit.prevent="InserttoCart">
                                <input type="text" class="form-control" wire:model='product_code' placeholder="Enter Product Code" name="" id="">
                            </form>
                        </div>
                        @if( session()->has('success') )
                            <div class = "alert alert sucess">
                                {{ session('success') }}
                            </div>
                            @elseif( session()->has('info') )
                                <div class = "alert alert-info">
                                    {{ session('info') }}
                                </div>  
                            @elseif( session()->has('error') )
                                <div class = "alert aler-danger">
                                    {{ session('error') }}
                                </div>  
                        @endif
                        <div class="alert alert-success">{{$message}}</div>
                        {{$productInCart}}
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th> 
                                    <th>Discount (%)</th>
                                    <th>Total</th> 
                                    <!--<th><a href="#" class="btn btn-success btn-sm add_more rounded-circle"><i class="fa fa-plus add_more"></i></a></th>-->
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                @foreach($productInCart as $key=> $cart)
                            <tr>
                                <td class="no">{{$key + 1}}</td><!-- the s/n for it to work-->
                                <td width="30%">
                                 <input type = "text" class = "form-control" value = "{{ $cart->product->product_name }}" >
                                </td>
                                <td width="15%">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button wire:click.prevent="IncrementQty( {{ $cart->id }} )" class="btn btn-success form-control">+</button>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">{{$cart->product_qty}}</label>
                                        </div>
                                        <div class="col-md-1">
                                            <button wire:click.prevent="DecrementQty( {{ $cart->id }} )" class="btn btn-danger form-control">-</button>
                                        </div>
                                    </div>
                                    <!--<input type="number" name="quantity[]" id="quantity" class="form-control quantity" value="{{ $cart->product_qty }}">--> 
                                </td>
                                <td>
                                    <input type="number"  class="form-control" value="{{ $cart->product_price}}"> 
                                </td> 
                                <td>  
                                    <input type="number"  class="form-control discount">
                                </td>
                                <td>
                                    <input type="number"  class="form-control"  value="{{ $cart->product_qty * $cart->product_price}}">
                                </td>
                                <td>
                                    <a  href="#" class="btn btn-sm btn-danger  rounded-circle"><i class="fa fa-times" wire:click="removeProduct({{ $cart->id}})"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                    </div>
                    </div>    
                    </div>
                    </div>
                    <div class="container" id="search">
                    <div class="col-md-4">
                        <form method="POST" action="{{ route('orders.store') }}">
                         @csrf
                         @foreach($productInCart as $key=> $cart)
                                 <input type = "hidden" class = "form-control" name="product_id[]" value = "{{ $cart->product->id }}" name = "" id = "">
                                    <div class="row">
                                        <div class="col-md-2">
                                           <input type="hidden" name="quantity[]" class="form-control" value="{{ $cart->product_qty }}">
                                        </div>
                                    </div>
                                
                                    <input type="hidden" name="price[]"  class="form-control price" value="{{ $cart->product_price}}"> 
                               

                                    <input type="hidden" name="discount[]"  class="form-control discount">
                                
                                    <input type="hidden" name="total_amount[]"  class="form-control total_amount"  value="{{ $cart->product_qty * $cart->product_price}}">
                                
                                    
                                
                          
                            @endforeach
                        <div class=card>
                            <div class="card-header">
                                <h4>TOTAL  <b class="total">{{ $productInCart->sum('product_price')}}</b></h4>
                            </div>
                            <div class="card-body"> 
                                <div class="btn-group">
                                 <button type="button" class="btn btn-dark" onClick="PrintReceiptContent('print')">
                                     <i class="fa fa-print"></i> Print
                                 </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <button type="button" class="btn btn-primary" onClick="PrintReceiptContent('print')">
                                     <i class="fa fa-print"></i> History 
                                 </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <button type="button" class="btn btn-danger" onClick="PrintReceiptContent('print')">
                                     <i class="fa fa-print"></i> Report
                                 </button>
                                </div>
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-striped ">
                                        <tr>
                                                <td>
                                                    <label for="customer_name">Customer Name</label>
                                                    <input type="text" name="customer_name" class="form-control" id="">
                                            </td>
                                            <td>
                                                    <label for="customer_name">Customer Phone</label>
                                                    <input type="number" name="customer_phone" class="form-control" id="">
                                            </td>
                                        </tr>
                                    </table>
                                    <td> Payment Method <br>
                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="cash" checked="checked">
                                            <label for="payment_method">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-money-bill text-success"></i> Cash</label>
                                        </span>
                                        
                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="bank transfer">
                                            <label for="payment_method">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-university text-danger"></i> Bank Transfer</label>
                                        </span>
                                            
                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="credit card">
                                            <label for="payment_method">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-credit-card text-info"></i> Credit card</label>
                                        </span>
                                        
                                    </td><br>

                                    <td><!-- this is licking the payment section to work with the total and bring out the change-->
                                        Payment
                                        <input type="number"  wire:model="pay_money" name="paid_amount" id="paid_amount" class="form-control">
                                        </td>
                                        <td>
                                            Returning Change
                                        <input type="number" wire:model="balance" readonly name="balance" id="balance" class="form-control">
                                        </td>
                                        <td>
                                            <button class="btn-primary btn-block form-control mt-3">Save</button>
                                        </td>
                                        <td>
                                            <button class="btn-danger btn-block form-control mt-3">Calculator</button>
                                        </td>
                                        <div class="text-center" style="text-align: center;">
                                            <a href="#" class="text-danger text-center"><i class=" fa fa-sign-out-alt"></i> Log Out </a>
                                        </div>
                                   </td>
                                 </form> 
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                
    </div>            
</div> 


<!-- modal section-->
<div class="modal right fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Add Product </h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form  Action="{{route ('products.store') }}" Method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product_name</label>
                    <input type="text" name="product_name" id="name" class="form-control">
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
                    <input type="number" name="stock" id="email" class="form-control">
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
<!--printing of receipts but the fuctions has been added to the total body aspect-->
<div class="modal">
    <div id="print"><!--note that this print is being called out in the button section in the total aspect-->
        @include('reports.receipts')
    </div>
</div>
