<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Detail;
use App\Product;
use App\Cart;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        $orders=Order::all();
        // last order detail name and phone no 
        $lastOrder=Order::max('id');
        $nameoforder=Order::where('id', $lastOrder)->get();
        //last order_detail details
        //$lastID = Order_Detail::max('order_id');
        //$order_receipt = Order_Detail::where('order_id',$lastID)->get();

       
        return view('orders.index',[
            'orders'=>$orders,
            'products'=>$products,
            //'order_receipt'=>$order_receipt,
            'nameoforder'=>$nameoforder
        ]);
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
    public function store(Request $request)
    {
        
        //to  store all the content to the database
       // note for this to work no that you downloaded php namespace resolver for it , it is in the extension window sha or just type use DB
        DB::transaction(function () use ($request) {
          
            //order model
            $orders = new Order;
            //order name and phone no used to in the form
            $orders->name = $request->customer_name;
            $orders->phone = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;

            // order_details model
            for($product_id= 0; $product_id < is_countable($request->product_id); $product_id++){
                $order_details = new Order_Detail;
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->unitprice = $request->price[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->discount = $request->discount[$product_id];
                $order_details->amount = $request->total_amount[$product_id];
                $order_details->save();
            }
            

            //transaction model
            $transactions = new Transaction();
            $transactions->order_id = $order_id;
            $transactions->user_id = auth()->user()->id; 
            $transactions->balance = $request->balance;
            $transactions->paid_amount = $request->paid_amount;
            $transactions->payment_method = $request->payment_method;
            $transactions->transac_amount = $order_details->amount;
            $transactions->transac_date = date('y-m-d');
            $transactions->save();
            Cart::where('user_id',auth()->user()->id)->delete();
               // last Order History
            $products = Product::all();
            $order_details = Order_Detail::where('order_id', $orders->id)->get();
            $orderedBy = Order::where('id', $orders->id)->get();

            return view('orders.index',
                 [
                    'products'=> $products,
                    'order_details'=> $order_details,
                    'customer_orders' => $orderedBy

               
                 ]);

        });
      
       return back()->with( " you have successfully order for a product");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
