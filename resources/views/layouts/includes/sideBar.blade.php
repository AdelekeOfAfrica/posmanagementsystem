<nav class="active" id="sidebar">
    <ul class="list-unstyled lead ">
       <li class="active">
        <a href=""><i class=" fa fa-home fa-lg"></i>home</a>
        </li>   
        <li>
        <a href="{{ route('orders.index') }}"> <i class="fa fa-box fa-lg"></i> Orders</a>
        </li>
        <li>
        <a href="{{route('transactions.index')}}"><i class="fa fa-money-bill fa-lg"> Transactions</i></a>
        </li>
        <li>
        <a href="{{route('products.index')}}"><i class="fa fa-truck fa-lg"> Products</i></a>
        </li>
        <li>
          <a href = "{{route('sections.index')}}"><i class = "fa fa-box fa-lg"></i> Sections</a>
        </li>
    </ul>
</nav>

<style>
    #sidebar ul.lead{
        border-bottom:1px solid #47748b;
        width:fit-content;
    }
    #sidebar ul li a{
        padding:10px;
        font-size:1.1em;
        display:block;
        width:40vh;
        color:#008B8B;
    }
    #sidebar ul li a:hover{
        background:#008B8B;
        color:#fff;
        text-decoration:none !important;
    }
    #sidebar ul li a i{
        margin-right:10px;
        
    }
    #sidebar ul li.active>a, a[aria-expanded="true"]{
        color:#fff;
        background:#008B8B;
    }
</style>