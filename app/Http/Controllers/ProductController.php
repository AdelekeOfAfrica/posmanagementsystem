<?php

namespace App\Http\Controllers;

use App\Product;
use Picqer;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(15);
        // 
        return view('Products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Product $products)
    { 
     //adding of image to the form using if statement 
     if ($request->hasFile('product_image')){
        $file = $request->file('product_image');
        $file->move(public_path(). '/product/images', $file->getClientOriginalName());
        $product_image = $file->getClientOriginalName();  
        $products->product_image = $product_image;      
    }
     //ending of adding of image to the form

        //product code section which is being used to generate the barcode in jpg format 
        $product_code = $request->product_code;
        $redColor = '255,0,0';
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents('product/barcodes/'.$product_code .'.jpg',
        $generator->getBarcode($product_code,
        $generator::TYPE_CODE_128, 3, 50));
        $products->barcode = $product_code . '.jpg';
        //end of barcode section
       


        //end of product code section which is being used to generate the barcode
      $products=Product::create($request->all());
      $products = new Product;
      $products->product_name = $request->product_name;
      $products->product_code = $product_code;
      $products->quantity = $request->quantity; 
      $products->price = $request->price;
      $products->brand = $request->brand;
      $products->alert_stock = $request->alert_stock;
      $products->description = $request->description;
      $products->barcode = $product_code . '.jpg';
      $products->save();

      return redirect()->back()->with('success', 'product successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products)
    {
        $product_code = $request-> product_code;

        $products = Product::find($products);
        //image section
        if ($request->hasFile('product_image')){
            if ($products->product_image !=''){
                $proimage_path = public_path().'/product/images/'.$products->product_image.'jpg';
                unlink($proimage_path);
            }
            $file = $request->file('product_image');
            $file->move(public_path(). '/product/images', $file->getClientOriginalName());
            $product_image = $file->getClientOriginalName();  
            $products->product_image = $product_image;      
        }
         //ending of adding of image to the form
    
            //product code section which is being used to generate the barcode in jpg format
            if ($request->product_code != '' && $request->product_code != $products->product_code){

                 if ($products->barcode !=''){
                     $barcode_path = public_path().'/product/barcodes/'.$product_code.'jpg';
                     unlink($barcode_path);
                 }

                $product_code = $request->product_code;
                $redColor = '255,0,0';
                $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
                file_put_contents('product/barcodes/'.$product_code .'.jpg',
                $generator->getBarcode($product_code,
                $generator::TYPE_CODE_128, 3, 50));
                $products->barcode = $product_code . '.jpg';
            //end of barcode section
            }
            

      
      $products->product_name = $request->product_name;
      $products->product_code = $product_code;
      $products->quantity = $request->quantity; 
      $products->price = $request->price;
      $products->brand = $request->brand;
      $products->alert_stock = $request->alert_stock;
      $products->description = $request->description;
     
      $products->save();

      return redirect()->back()->with('success', 'product successfully created');    
        //$product->update($request->all());
        return redirect()->back()->with('success','info successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->back()->with('error','this product cannot be deleted');
       if(!$product){
           return redirect()->back()->with('error','this product cannot be deleted');

       }

    }
    //bar code function 
    public function getProductBarcode(){
       $products = Product::select('barcode','product_code','product_image')->get();
        
        return view ('products.barcodes.index',compact('products'));

    }
}
