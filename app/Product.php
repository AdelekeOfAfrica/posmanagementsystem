<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['product_name',
'description',
'brand','price',
'quantity','barcode','product_image','qrcode',
'alert_stock'];
    //

    public function orderdetail(){
        return $this->hasMany('App\Order_Detail');
    }

    public function cart(){
        return $this->hasmany('App\Cart');
    }
}
