@extends('backend.layouts.master')
@section('title')
   Task Update Listing Page
@endsection
@section('css')
    <link  href="{{asset('backend/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Task Update Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            {{--<div class="text-right">
                                <a href="{{route('create.servicetype')}}" class="btn btn-success btn-rounded">New Service Type</a>
                                <a href="{{route('servicetype.list')}}" class="btn btn-success btn-rounded">View Service Type</a>
                                <a href="{{route('serviceorder.create')}}" class="btn btn-success btn-rounded">New Service Order</a>

                                
                            </div>--}}
                           
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Listing Task Update Deails</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="height: 200px;overflow: scroll;">
                            <h2>Current Service Details:</h2>
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>WorkOrder No</th>
                                    <th>Customer Name</th>
                                      <th>Product Name</th>
                                    <th>Service Type</th>
                                    <th>Address</th>
                                  <th>Task Assigned To</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($serviceorders as $so)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td><a href="{{route('workorder.update.task' ,[$so->order_id])}}" style="color:blue;">{{$so->order_id}}</a> 
                                        </td>
                                        <td> {{$so->client_name}}</td>
                                        <td> {{$so->name}}</td>
                                        <td>{{$so->type_name}} </td>
                                        <td> {{$so->address}}</td>
                                        <td> {{$so->technician}}</td>
                                        <td> {{date('d-m-Y', strtotime($so->created_at))}}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <div class="x_content" style="height: 400px;overflow: scroll;">
                            <h2>Service History Details:</h2>
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>WorkOrder No</th>
                                    <th>Description</th>
                                      <th>Service Date</th>
                                    
                                    <th>Next Service Date</th>
                                  <th>Serviced By</th>
                                    <th>Service Charge</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($servicehistory as $his)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$his->order_id}} 
                                        </td>
                                        <td> {{$his->description}}</td>
                                        <td> {{$his->service_date}}</td>
                                        
                                        <td> {{$his->next_servicedate}}</td>
                                        <td> {{$his->technician}}</td>
                                        <td> {{$his->service_charge}}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <h2>Material Details:</h2>
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>WorkOrder No</th>
                                    <th>Material Name</th>
                                    <!--  <th>Quantity</th>-->
                                    
                                    <th>Warranty Start Date</th>
                                  <th>Warranty End Date</th>
                                  <!--  <th>Material Cost</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($servicematerial as $sm)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$sm->order_id}} 
                                        </td>
                                       <td> {{$sm->material_name}}</td>
                                      <!--   <td> {{$sm->qty}}</td>-->
                                        
                                        <td> {{$sm->start_date}}</td>
                                        <td> {{$sm->end_date}}</td>
                                      <!--  <td> {{$sm->price}}</td>-->
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                       <div class="x_content" style="height: 600px;overflow: scroll;">
                        <h2>Add Material Details:</h2>
            <form action="{{route('workorder.update.task.status')}}" method="post">
                {{ csrf_field()}}
            <table class=style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="dynamicTable">  

            <tr>

                <th>Name</th>

               <!-- <th>Qty</th>

                <th>Price</th>-->
                <th>Warranty(Start & End Date)</th>

                <th>Action</th>

            </tr>

            <tr>  

                <td><input type="text" name="addmore[0][name]" placeholder="Enter Product Name" class="form-control" /></td>  

              <!--  <td><input type="text" name="addmore[0][qty]" placeholder="Enter Qty" class="form-control" /></td>  

                <td><input type="text" name="addmore[0][price]" placeholder="Enter Price" class="form-control" /></td> -->
                <td><input type="date" name="addmore[0][start_date]" placeholder="Warranty Start Date" class="form-control" />
                    <input type="date" name="addmore[0][end_date]" placeholder="Warranty End Date" class="form-control" />
                </td> 

                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

            </tr>  

        </table> 
            
                                <div class="form-group">
                                    <label for="status_update">Service Work Order Status</label>
                                    <select id = "status_update" name="status_update" class="form-control">
                                         <!--  <option value="" selected>Select Status </option>-->
                                           <option value="0">Closed</option>
                                          <!--  <option value="2" >Unclosed</option>-->
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_update">Next Service Date</label>
                                    <input type="date" id="next_service_date" name="next_service_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="status_update">Service Charge</label>
                                    <input type="number" id="service_charge" name="service_charge" class="form-control">
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" class="form-control" id="order_id" name="order_id" value="{{$so->order_id}}">
                                    <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{$so->customer_id}}">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section('script')
<script type="text/javascript">

   

    var i = 0;

       

    $("#add").click(function(){

   

        ++i;

   

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter Product Name" class="form-control" /></td><td><input type="date" name="addmore['+i+'][start_date]" placeholder="Warranty Start Date" class="form-control" /><input type="date" name="addmore['+i+'][end_date]" placeholder="Warranty End Date" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });

   

    $(document).on('click', '.remove-tr', function(){  

         $(this).parents('tr').remove();

    });  

   

</script>
@endsection
                 