@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @livewire('order')
</div>



<style>
  #search{
      position:fixed;
      top:81px;
      right:-650px;
  }  
  .modal.right .modal-dialog{
      position:absolute;
      top:0px;
      right:0px;
      margin-right:20vh;
  }
  .modal.fade:not(.in).left .modal-dialog{
      -webkit-transform:translate3d(50%,0,0);
      transform:translate3d(50%,0,0);
  }

  .radio-item  input [type="radio"]{
      visibility:hidden;
      width:20px;
      height:20px;
      margin: 0 5px 0 5px;
      padding:0px;
      cursor:pointer;
  }
    /* before style */
  .radio-item input[type="radio"]:before{
      position: relative;
      margin: 4px -25px -4px 0;
      display:inline-block;
      visibility: visible;
      width: 20px;
      height: 20px;
      border-radius: 10px;
      border:2px inset rgb(150, 150, 150, 0.75);
      background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%, rgb(250, 250, 250) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
      content:'';
      cursor:pointer;

  }

  /* afer style */
  .radio-item input[type="radio"]:after{
      position: relative;
      top:0px;
      left:9px;
      display:inline-block;
      visibility: visible;
      width:12px;
      height:12px;
      background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%, rgb(225, 240, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
      content:'';
      cursor:pointer;

</style>

@endsection
@section('script')
<script>
    //this script function works with the increment of serial numbers and adding of rows and button using append 
    // but watch out for the + that ends the tr role sha it gave me a lot of headache  
    $('.add_more').on('click', function(){
     var product = $('.product_id').html();
     var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
     var tr = '<tr><td class"no"">' + numberofrow + '</td>' +
              '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>'+
              '<td><input type ="number" name="quantity[]" class="form-control quantity"></td>'+
              '<td><input type ="number" name="price[]" class="form-control price"></td>'+
              '<td><input type ="number" name="discount[]" class="form-control discount"></td>'+
              '<td><input type ="number" name="total_amount[]" class="form-control total_amount"></td>'+
              '<td><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a></td>';
             $('.addMoreProduct').append(tr);
            
    });
    //delete a row
    $('.addMoreProduct').delegate('.delete','click', function(){
        $(this).parent().parent().remove();

    });
    // to calculate the total amount with number of quantity choosen same with the price 
    function TotalAmount(){
        // logic to make the calculation work
        var total = 0; 
        $('.total_amount').each(function(i, e){
            var amount = $(this).val() - 0;
            total += amount; 
        });

        
        $('.total').html(total);
        
    }

    // the above is to show zero this is where the main work is 

    $('.addMoreProduct').delegate('.product_id', 'change', function(){
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price'); // this is attached to the option value to get the price 
        tr.find('.price').val(price);
        var qty = tr.find('.quantity').val() - 0;
        var disc = tr.find('.discount').val() - 0;
        var price = tr.find('.price').val() - 0;
        var total_amount = (qty * price) -((qty * price * disc) / 100);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });
 // this code is to automatically use the quantity inputed to generate the total price 
    $('.addMoreProduct').delegate('.quantity, .discount', 'keyup', function(){
        var tr = $(this).parent().parent();
        var qty = tr.find('.quantity').val() - 0;
        var disc = tr.find('.discount').val() - 0;
        var price = tr.find('.price').val() - 0;
        var total_amount = (qty * price) -((qty * price * disc) / 100);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();

    });
    $('#paid_amount').keyup(function(){
        var  total = $('.total').html();
        var paid_amount = $(this).val();
        var tot = paid_amount - total;
        $('#balance').val(tot).toFixed(2);

    });

    /* printing of the receipt */

    function PrintReceiptContent (el){
        var data = '<input type="button" id="printPageButton class=" printPageButton" style="display:block; width:100%; border:none; background-color:#008b8b; color:#fff; padding:14px 28px; font-size:16px; cursor:pointer; text-align:center" value="Print Receipt" onClick="window.print()">';

         data += document.getElementById(el).innerHTML;
         myReceipt = window.open("","mywin","left=150, top=130, width=400, height=400");
         myReceipt.screnX = 0;
         myReceipt.screnY = 0;
         myReceipt.document.write(data);
         myReceipt.document.title = " print receipt";
         myReceeipt.focus();
         setTimeout(()=>{
             myReceipt.close()
         },8000);


    }


</script>
@endsection
 