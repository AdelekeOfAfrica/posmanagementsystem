<div class="modal right fade" id="ProductPreview{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"> {{$product->product_name}}</h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                        {{$product->id}}
                    </div>
                    <div class="modal-body">
                        <div class="class">
                            <img src = "{{asset('product/images/'.$product->product_image)}}" width="260" alt="" style = "cursor:pointer;">
                           
                        </div>

                        <div class="class">
                            <img src = "{{asset('product/barcodes/'.$product->barcode)}}" width="260" alt="" style = "cursor:pointer;">
                            <input type = "text" height = "200" class = "form-control" value ="{{$product->barcode}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>