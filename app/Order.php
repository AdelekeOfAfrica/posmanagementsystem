<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['name','address'];
    
    //
    public function orderdetails(){
        return $this->hasMany('use App\Order_Detail');
    }
}
