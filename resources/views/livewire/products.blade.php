<div>
<div class="container-fluid">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                   <h4 style="float:left;">Add New Products </h4>
                   <a href="#" style="float:right;" class=" btn bnt-dark" 
                   data-toggle="modal" data-target="#addProduct">
                   <i class="fa fa-plus"></i> Add New Product</a>

                </div>
                <div class="card-body">
                @include('products.table')
                </div>
             </div>
        </div>
        
    </div>
</div>
<div class="container" id="search">
    <div class="col-md-4">
        <div class=card>
            <div class="card-header">
                <h4>PRODUCT DETAILS</h4>
            </div>
            <div class="card-body"> 
                @include('products.product_details')
            </div>
        </div>
    </div>
</div>

</div>
