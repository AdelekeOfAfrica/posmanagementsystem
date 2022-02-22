<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use App\Cart;

class Order extends Component
{
    public $orders ,$products=[],$nameoforder=[],$order_receipt=[],$receipt=[],
    $product_code,$message='',$productInCart;
   //this section is episode 11 and it is talking about adding and minusing of the quantity 
    public $pay_money = '', $balance = '';
   public function IncrementQty($cartId){
       //incrementing the quantity 
       $carts = Cart::find($cartId);
       $carts->increment('product_qty', 1);
       // updating the price 
       $updatePrice = $carts->product_qty * $carts->product->price;
       $carts->update(['product_price' => $updatePrice]);
       $this->mount();

   }
   public function DecrementQty($cartId){
    //decrementing the quantity 
    $carts = Cart::find($cartId);
    // these is to make sure the quantity does not go to zero
    if ($carts->product_qty ==1){
        return session()->flash('info', 'Product'.$carts->product->product_name.'Quantity of the product cannot be less than 1, add or remove product.');
    }
    //
    $carts->decrement('product_qty', 1);
    // updating the price 
    $updatePrice = $carts->product_qty * $carts->product->price;
    $carts->update(['product_price' => $updatePrice]);
    $this->mount();
   }
  //
    public function mount(){
        $this->products = Product::all();
        $this->productInCart = Cart::all();
    }
    public function InserttoCart(){
        $countProduct = Product::where('id', $this->product_code)->first();
        if (!$countProduct){
            return $this->message = 'Product not found';
        }
        $countCartProduct = Cart::where('product_id', $this->product_code)->count();
        if ($countCartProduct > 0){
            return $this->message ='product'  . $countProduct->product_name .'  already exists in cart please add quantity';
        }
        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();
       
        $this->productInCart->prepend($add_to_cart);//  this enables it to generate the s/n number
        $this->product_code = '';
        return $this->message= 'product added succesfully !';

       // dd($countProduct);
    
    }
    public function removeProduct($cartId)
    {
         $deleteCart = Cart::find($cartId); 
         $deleteCart->delete();

         $this->message = 'these product has been deleted successfully';
         $this->productInCart = $this->productInCart->except($cartId);
    }
    public function render()
    {
        if ($this != ''){
        $totalAmount = (int) $this->pay_money  - (int) $this->productInCart->sum('product_price');
        $this->balance =$totalAmount;
    }
        return view('livewire.order');
    }
}
