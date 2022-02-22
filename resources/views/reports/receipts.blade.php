<!-- print section-->
<div id="invoice-pos">
    <div id="printed_content">
        <center id="top">
            <div class="logo">
              alagie
            </div>
            <div class="info"></div>
            <h2>Pos ltd</h2>
        </center>
    </div>

    <div class="mid">
        <div class="info">
            <h2>Contact Us</h2>
            @foreach($nameoforder as $order)
            <p>
                Name:{{$order->name}}
                Phone:{{$order->phone}}
            </p> 
            @endforeach 
        </div>

    </div>
    <!-- end of recceipt mid-->
    <div class="bot">
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="hours"><h2>Qty</h2></td>
                    <td class="rate"><h2>Unit</h2></td>
                    <td class="rate"><h2>Discount</h2></td>
                    <td class="rate"><h2>Sub Total</h2></td>
                </tr>
                @foreach ( $order_receipt as $receipt)
                    <tr class="service">
                        <td class="tableitem"><p class="itemtext">{{$receipt->product['product_name']}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{number_format($receipt->unitprice, 2)}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{$receipt->quantity}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{$receipt->discount}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{number_format($receipt->amount,2)}}</p></td>
                    </tr>
                @endforeach
                @foreach($order_receipt as $receipt)
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="rate"><p class="itemtext">Tax</p></td>
                    <td class="payment"><p class="itemtext">N{{number_format($receipt->amount,2)}}</p></td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="rate"><h2>Total</h2></td>
                    <td class="payment"><h2>N{{number_format($receipt->amount,2)}}</h2></td>
                </tr>
                @endforeach
            </table>
            <div class="legalcopy">
                <p class="legal"><strong>** Thank you for Visiting**</strong><br>
            The goods which are subject to tax,prices includes tax
            </p>
            </div>
            <div class="serial">Serial :
                <span class="serial">    
                 123456789
                </span>
                <span> 24/12/2020 &nbsp; &nbsp; 00:45</span>
           </div>
        </div>
    </div>
</div>
<style>
#invoice-pos{
    box-shadow: 0 0 1in -0.25in rgb(0,0, 0.5);
    padding:2mm;
    margin:0 auto;
    width:58mm;
    background:#fff;

}
#invoice-pos ::selection{
    background:#f315f3;
    color:#fff;

}
#invoice-pos ::moz-selection{
 background:#34495E;
 color:#fff;
}

#invoice-pos h1{
    font-size: 1.5em;
    color:#222;
}
#invoice-pos h2{
    font-size:0.9em;
    
}
#invoice-pos h3{
    font-size: 1.5em;
    color:#222;
}
#invoice-pos p{
    font-size:1.2em;
    font-weight:300;
    color:#666;

}
#invoice-pos #top, #invoice-pos #mid, #invoice-pos #bot{
    border-bottom: 1px solid #eee;
}
#invoice-pos #top{
    min-height:100px;
}
#invoice-pos #mid{
    min-height:100px;
}
#invoice-pos #bot{
    min-height:100px;
}
#invoice-pos #top .logo{
    height:60px;
    width:60px;
    background-image:url() no repeat;
    background-size:60px 60px;
    border-radius:50px;

}
#invoice-pos.info{
    display:block;
    margin-left:0px;
    text-align:center;
    
}
#invoice-pos.title{
    float:right;
}
#invoice-pos.title p{
    text-align:right;
}
#invoice-pos table{
    width:100%;
    border-collapse: collapse;

}
#invoice-pos .tabletitle{
    font-size:0.9em;
    background: #eee;

}
#invoice-pos .service{
    border-bottom:1px solid #eee;

}
#invoice-pos .item{
    width:24mm;
    
}
}
#invoice-pos .item{
    width:24mm;
    
}
#invoice-pos .itemtext{
    font-size: 0.7em;

}
#invoice-pos #legalcopy{
    margin-top: 5mm;
    text-align:center;


}

.serialnumber{
    margin-top:5mm;
    margin-bottom:2mm;
    text-align:center;
    font-size:12px;

}
.serial{
    font-size:10px !important;

}
</style>