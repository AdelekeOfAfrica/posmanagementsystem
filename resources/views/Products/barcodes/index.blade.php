@extends('layouts.app')
@section('content')
    <div class="container" id="search">
        <div class="col-md-12">
            <div class=card>
                <div class="card-header">
                    <h4>PRODUCT BARCODES </h4>
                </div>
                <div class="card-body"> 
                    <div id = "print">
                        <div class = "row" >
                            @forelse ($products as $barcode)
                                <div class = "col-lg-4.5 col-md-5 col-sm-12 text-center" >
                                    <div class = "card" >
                                        <div class = "card-body" >
                                            <img src = "{{ asset('product/barcodes/'.$barcode->barcode) }}" alt = "" style = "position:fixed; width:200px; height:25px; top:220px; left:600px;">
                                            {!! $barcode->barcode !!}
                                         <h4 class = "text-center" style = "padding: 1em; margin-top: 2em; "> {{$barcode->product_code}}</h4>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h2 align = "center" > No data </h2>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<style>
  #search{
      position:fixed;
      top:81px;
  }  
</style>

@endsection
 