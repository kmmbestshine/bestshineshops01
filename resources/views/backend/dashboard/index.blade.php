@extends('backend.layouts.master')
@section('title')
    Aquatech RO Dashboard Page
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2.min.css')}}">
    <!-- NProgress -->
    <link href="{{asset('backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('backend/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/login/css/style.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        
        <!-- top tiles -->
        <div class="row tile_count" style="font-size: x-large;">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                @if( Auth::user()->type == 'company')
                <div class="info-box blue-bg bg-red" style="text-align: center;border-radius: 5px;">

                    <i class="fa fa-money"></i>
                    
                    <div class="count">
                        Rs. 0
                    </div>
                    
                    <div class="title">Current Balance</div>
                    
                </div><!--/.info-box-->
                @endif
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                @if( Auth::user()->type == 'company')
                <div class="info-box brown-bg bg-primary" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-shopping-cart"></i>
                    
                    <div class="count">{{$totalrevenue}}</div>
                    <div class="title">Total Sales Revenue</div>
                    
                </div><!--/.info-box-->
                @endif
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg bg-red" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-thumbs-o-up"></i>
                    <div class="count">{{$totalcategory}}</div>
                    <div class="title">Total Product Category</div>
                </div><!--/.info-box-->
            </div><!--/.col-->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg bg-primary" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-product-hunt"></i>
                    <div class="count">{{$totalproduct}}</div>
                    <div class="title">Total No. of Product</div>
                </div><!--/.info-box-->
            </div><!--/.col-->
        </div>
        <!-- /top tiles -->
        
        @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
        @endif
        @if(Session::has('error_message'))
            <div class="alert alert-danger">
                {{ Session::get('error_message') }}
            </div>
        @endif
       
        <div class="resp"></div>
        <br>
        
        <div class="row">
            <div class="col-md-5">

                


                <div class="x_panel">
                    <div class="x_title">
                        <h2>Make Quick Sales
                            <small>Create Sales</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
            </div>
                    
                    <div class="x_content">
                        <form id="btnSave" action="{{route('sales.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                    <div class="col-md-8">
                        <div id="client" class="form-group">
                            <label for="">Customer ID</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="customer_id" placeholder="Enter Cust ID" class="form-control text-center"  required>
                                   
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        onclick="openForm()">New Customer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sale No : </label>
                            <input type="text" name="number_sale" class="form-control text-center" value="{{$inv_ids}}" readonly>
                        </div>
                    </div>
                </div>
                            <div class="form-group">
                                <label for="product_id">Chose Product</label>
                                <select class="form-control js-example-basic-single" id="product_id" name="product_id" data-placeholder="--Search Product--" required>
                                </select>
                                <span class="error"><b>
                                       @if($errors->has('product_id'))
                                            {{$errors->first('product_id')}}
                                       @endif</b>
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Stock Available</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock Available" disabled>
                                <span class="error"><b>
                                         @if($errors->has('stock'))
                                            {{$errors->first('stock')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="price">Price per/pices*</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="price" required>
                                <span class="error"><b>
                                         @if($errors->has('price'))
                                            {{$errors->first('price')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="gst_percent">GST / Tax Rate*</label>
                                <input type="text" class="form-control" name="gst_percent" id="gst_percent" placeholder="gst_percent" >
                                <span class="error"><b>
                                         @if($errors->has('gst_percent'))
                                            {{$errors->first('gst_percent')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="sales_quantity">Sales Quantity</label>
                                <input type="number" min="1" value="1" class="form-control" id="sales_quantity" name="sales_quantity" placeholder="Quantity" required>
                                <span class="error"><b>
                                         @if($errors->has('sales_quantity'))
                                            {{$errors->first('sales_quantity')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="sales_quantity">Warrenty</label>
                            <div style="overflow: hidden">
                                    <div style="border:2px solid #cccccc; float:left; padding-bottom:1000px; margin-bottom:-1000px" >
                                        
                                        <select id = "warrenty" name="warrenty" onchange = "ShowHideDiv1()" >
                                           <option value="" selected>No</option>
                                           <option value="Y">Yes</option>
                                           <!-- <option value="N" >Quote</option>-->
                                        </select>
                                    </div>
                                    
                                    <div style="border:1px solid #cccccc; float:right; padding-bottom:1000px; margin-bottom:-1000px">
                                        <div id="dvPassport1" style="display: none">
                                         <!--   <input class="form-control numeric-p8d2" type="text" id="txtPassportNumber1" name="amountdiscount" value=0.00 /> -->
                                         <label for="birthday">Start     :</label>    {{date("d-m-Y")}}
                                        <br>
                                        <br>
                                        <label for="txtPassportNumber1">End:</label>
                                        <input type="date" id="txtPassportNumber1" name="warentyEnd">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sales Status:- &nbsp;</label>
                                <input type="radio" name="sales_status" value="1" id="Active" checked=""><label for="Active"> Cash Sales </label>
                                <input type="radio" name="sales_status" id="deactive" value="0"><label for="deactive"> Credit Sales </label>
                            </div>
                            <input type="hidden" name="birthday_status" value="0">
                            <input type="hidden" name="dob" value="2017-">
                            <input type="hidden" name="phone" value="977-">
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="btnSave" class="btn btn-primary"> Make QuickSales </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Quick Sales Billing
                            <small>Listing Billing</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="saleslist">

                        </div>
                        <div id="ajaxform">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if( Auth::user()->id == 1)
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Location Tracking
                            
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                   <div class="x_content">
                        
                    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">

                            <title></title>

                            <!-- Fonts -->
                            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

                            <!-- Script -->
                            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

                            <!-- Styles -->
                            <style>
                                html, body {
                                    background-color: #fff;
                                    color: #636b6f;
                                    font-family: 'Nunito', sans-serif;
                                    font-weight: 200;
                                    height: 100vh;
                                    margin: 0;
                                }

                                .full-height {
                                    height: 100vh;
                                }

                                

                                .position-ref {
                                    position: relative;
                                }

                                .links > a {
                                    color: #636b6f;
                                    padding: 0 25px;
                                    font-size: 13px;
                                    font-weight: 600;
                                    letter-spacing: .1rem;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                }

                                
                            </style>
                        </head>
                        <body onload="getLocation()">

                            <div class="flex-center position-ref full-height">
                                
                                <div class="content">
                                  <!--   <h4><div id="result"></div></h4>-->
                                  <h4><div id="output"></div></h4>
                                    

                                </div>
                                
                            </div>

                            <!-- Track location using laravel -->
                        <!--    <script>
                                var x;

                                function getLocations() {
                                    
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else {
                                        x = "Geolocation is not supported by this browser.";
                                    }
                                }

                                function showPosition(position) {
                                    
                                    $.post('{{ route('location') }}', {

                                        '_token': "{{ csrf_token() }}",

                                        latitude:position.coords.latitude,
                                        longitude:position.coords.longitude,

                                    }, function (data) {
                                        
                                        var address         =  '<div class="links"><strong>'+data.address+'</strong></div>';
                                        var district        =  '<div class="links"><strong>'+data.district+'</strong></div>';
                                        var full_address    =  '<div class="links"><strong>'+data.full_address+'</strong></div>';
                                        var division        =  '<div class="links"><strong>'+data.division+'</strong></div>';

                                        $('#result').html(address);
                                    });
                                }
                            </script> -->

                        </body>
                    </html>

                    </div>
                  
                </div>
            </div>
        </div>
        @endif
        <br/>
        <br/>
    </div>
<div class="form-popup" id="myForm" <div class="form-popup" id="myForm"  style="width: 300px; height: 280px; overflow-y: scroll;">
    
  <form action="{{route('customer.store')}}" class="form-container" method="post">
    {{ csrf_field() }}

    <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                    <span class="error"><b>
                                           @if($errors->has('name'))
                                                {{$errors->first('name')}}
                                            @endif</b>
                                     </span>
                                </div>
    <div class="form-group">
                                    <label for="cust_id">Customer ID*</label>
                                    <input type="text" class="form-control" id="cust_id" name="cust_id" placeholder="Enter Customer ID">
                                    <span class="error"><b>
                                           @if($errors->has('cust_id'))
                                                {{$errors->first('cust_id')}}
                                            @endif</b>
                                     </span>
                                </div>
    <div class="form-group">
                                    <label for="mobile">Mobile*</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No">
                                    <span class="error"><b>
                                           @if($errors->has('mobile'))
                                                {{$errors->first('mobile')}}
                                            @endif</b>
                                     </span>
                                </div>
    <label for="gsttin">GST No</label>
    <input type="text" class="form-control" id="gsttin" name="gsttin" placeholder="Enter GST No">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
    <div class="form-group">
                                    <label for="address">Address*</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                    <span class="error"><b>
                                           @if($errors->has('address'))
                                                {{$errors->first('address')}}
                                            @endif</b>
                                     </span>
                                </div>
    <label for="landmark">Land Mark</label>
    <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Land Mark">
    <label>Status</label>
    <input type="radio" name="status" value="1" id="Active" checked=""><label for="Active"> Active</label>
    <input type="radio" name="status" id="deactive" value="0"><label for="deactive">DeActive</label>
    
    <div class="form-group">
        <input type="hidden" name="sale" value="dashboard" >
        <button type="submit" class="btn">Login</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </div>
  </form>
</div>



    <!-- /page content -->
@endsection

@section('script')
<script src="http://code.jquery.com/jquery-2.2.4.min.js" ></script>
        <script>
        
            var x = document.getElementById('output');
            function getLocation(){
                alert('jjj');
                if(navigator.geolocation){
                    var options = {timeout:60000};
                    navigator.geolocation.watchPosition(showPosition,showError,options);
                }else{
                    x.innerHTML = "Browser Not Supporting";
                }
            }
            function showPosition(position){
        // Google API URL for getting response
            var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+position.coords.longitude+"&key=AIzaSyAraCT6ZV1QmDH36IlgjjU0m2BJxMDc3_Q";
               $.get({
                url : locAPI,           
                success: function(data){
                    console.log(data);
                var formatedAddress = data.results[0].formatted_address;
               // var formatedAddressOutput =
                           // <ul class="list-group">
                              //  <li class="list-group-item">${formatedAddress}</li>
                           // </ul>
                    x.innerHTML = formatedAddress;
                }
               });
            }

            //show error
            function showError(error){
                switch(error.code){
                    case error.PERMISSION_DENIED :
                    x.innerHTML = "code: "+error.code+" User Don't want to share location";
                    break;
                    case error.POSITION_UNAVAILABLE :
                    x.innerHTML = "code: "+error.code+" User location data is not available";
                    break;
                    case error.TIMEOUT :
                    x.innerHTML = "code: "+error.code+" TIMEOUT !!";
                    break;
                    case error.UNKNOWN_ERROR :
                    x.innerHTML = "code: "+error.code+" There is something unknown error";
                    break;
                }
            }
        </script>
<script type="text/javascript">
    function ShowHideDiv() {
        var invoice_status = document.getElementById("invoice_status");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = invoice_status.value == "Y" ? "block" : "none";
    }
</script>
<script type="text/javascript">
    function ShowHideDiv1() {
        var warrenty = document.getElementById("warrenty");
        var dvPassport1 = document.getElementById("dvPassport1");
        dvPassport1.style.display = warrenty.value == "Y" ? "block" : "none";
    }
</script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */


/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 40%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    <script src="{{asset('backend/plugins/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".js-example-basic-single").select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product_id').on('change', function () {
                var prdid = $(this).val();
                var path = 'getquantity';
                $.ajax({
                    url: path,
                    method: 'post',
                    data: {'product_id': prdid, '_token': $('input[name=_token]').val()},
                    dataType: 'text',
                    success: function (resp) {
                        console.log(resp);
                        //$('#quantity').empty();
                        $('#stock').val(resp);
                    }
                });

            });
            $('#product_id').on('change', function () {
                var prdid = $(this).val();
                //alert(prdid);
                var path = 'gettaxrate';
                $.ajax({
                    url: path,
                    method: 'post',
                    data: {'product_id': prdid, '_token': $('input[name=_token]').val()},
                    dataType: 'text',

                    success: function (resp) {
                        console.log(resp);

                        //$('#quantity').empty();

                        $('#gst_percent').val(resp);
                    }
                });

            });

            $('#product_id').on('change', function () {
                var prdid = $(this).val();
                var path = 'getprice';
                $.ajax({
                    url: path,
                    method: 'post',
                    data: {'product_id': prdid, '_token': $('input[name=_token]').val()},
                    dataType: 'text',
                    success: function (resp) {
                        console.log(resp);
                        //$('#price').empty();
                        $('#price').val(resp);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CRF-TOKEN': $('meat[name = "csrf-token"]').attr('content')
                }
            });
            $('#btnSave').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    type: post,
                    data: data,
                    success: function (data) {
                        refreshproduct();
                        readsales();
                        ajaxform();
                        var m = "<div class='alert alert-success'>" + data.success_message + "</div>";
                        // alert(data.success_message);
                        $('.resp').html(m);
                        document.getElementById("btnSave").reset();
                    }
                });
            });
        });
        readsales();
        refreshproduct();
        readsales();
        refreshproduct();
        ajaxform();
        function readsales() {
            $.ajax({
                type: 'get',
                url: "{{url('ajaxsales-list')}}",
                dataType: 'html',
                success: function (data) {
                    $('#saleslist').html(data);
                }
            })
        }
        function ajaxform() {
            $.ajax({
                type: 'get',
                url: "{{url('ajax-form')}}",
                dataType: 'html',
                success: function (data) {
                    $('#ajaxform').html(data);
                }
            })
        }
        function refreshproduct() {
            $.ajax({
                type: 'get',
                url: "{{url('refresh-product')}}",
                dataType: 'html',
                success: function (data) {
                    $('#product_id').html(data);
                }
            })
        }
        function printorder() {
            $.ajax({
                url: "{{url('sales-allpdf')}}",
                type: 'get',
                dataType: 'html',
                success:function(data) {
                    var mywindow = window.open('', 'Sabaiko Live Bakery', 'height=400,width=600');
                    mywindow.document.write('<html><head><title></title>');
                    mywindow.document.write('</head><body>');
                    mywindow.document.write(data);
                    mywindow.document.write('</body></html>');
                    mywindow.document.close();
                    mywindow.focus();
                    mywindow.print();
                    mywindow.close();

                }
            });
        }

    </script>

    <!-- FastClick -->
    <script src="{{asset('backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('backend/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('backend/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('backend/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('backend/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('backend/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('backend/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('backend/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
@endsection