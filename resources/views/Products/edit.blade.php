<div class="modal right fade" id="editUser{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Edit User </h4>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                        </button>
                                        {{$product->id}}
                                    </div>
                                    <div class="modal-body">
                                        <form  Action="{{route ('products.update', $product->id) }}" Method="POST" enctype = "multipart/form-data" autocomplete = "off">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="name">Product_name</label>
                                                <input type="text" name="product_name" id="name" value="{{$product->product_name}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="product_image">Product_image</label>
                                                <img src = "{{asset('product/images'.$product->product_image)}}" alt="" style = " position:absolute; left:85px; cursor:pointer;">
                                                <input type="file" name="product_image" id="product_name" value="{{$product->product_image}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="barcode">barcode</label>
                                                <input type="text" name="barcode" id="barcode" value="{{$product->barcode}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Brand</label>
                                                <input type="text" class="form-control" name="brand"value="{{$product->brand}}" id="brand">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Price</label>
                                                <input type="number" name="price" value="{{$product->price}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Quantity</label>
                                                <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Alert_Stock</label>
                                                <input type="number" name ="alert_stock" value="{{$product->alert_stock}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" rol="30" col="30"  id=""  class="form-control">{{$product->description}}</textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary btn-block">Save Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           </div>