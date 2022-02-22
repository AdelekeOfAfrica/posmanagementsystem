<div class="modal right fade" id="deleteUser{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">  Delete User </h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                        {{$product->id}}
                    </div>
                    <div class="modal-body">
                        <form  Action="{{route ('products.destroy',$product->id) }}" Method="POST">
                            @csrf
                            @method('delete')
                            <p>Are you sure you want to delete this product {{$product->product_name}} ? </p>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal"> cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>