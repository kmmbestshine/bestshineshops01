@extends('backend.layouts.master')
@section('title')
   Service Order Listing Page
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
                    <h3>Total Service Order Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            <div class="text-right">
                                <a href="{{route('create.servicetype')}}" class="btn btn-success btn-rounded">New Service Type</a>
                              <!--  <a href="{{route('servicetype.list')}}" class="btn btn-success btn-rounded">View Service Type</a>-->
                                <a href="{{route('serviceorder.create')}}" class="btn btn-success btn-rounded">New Service Order</a>

                            </div>
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
                            <h2>Listing Service Order Deails</h2>
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

                <div class="panel panel-default tabs">                            
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#tab-first" role="tab" data-toggle="tab" style="background-color:rgb(255, 165, 0);"><p style="color:blue">Open Service List</p> 
                                &nbsp;<i class="fa fa-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-second" role="tab" data-toggle="tab" style="background-color:rgb(60, 179, 113);"><p style="color:blue">Closed Service List</p>
                                &nbsp;<i class="fa fa-user"></i>
                            </a>
                        </li>
                       <li>
                            <a href="#tab-fourth" role="tab" data-toggle="tab" style="background-color:#ffcccb;"><p style="color:blue">First Service List</p>
                                &nbsp;<i class="fa fa-user"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="panel-body tab-content">
                        <div class="tab-pane active" id="tab-first">
                              <div class="x_content" style="height: 600px;overflow: scroll;">
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="opentask">
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
                                    <th>Assigned To </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($serviceorders as $so)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td><a href="{{route('workorder.assign.create' ,[$so->order_id])}}" style="color:blue;">{{$so->order_id}}</a> 
                                        </td>
                                        <td> {{$so->client_name}}</td>
                                        <td> {{$so->name}}</td>
                                        <td>{{$so->type_name}} </td>
                                        <td> {{$so->address}}</td>
                                        <td> {{$so->technician}}</td>
                                        <td> {{date('d-m-Y', strtotime($so->created_at))}}</td>
                                        <td><a href="{{route('workorder.assign.create' ,[$so->order_id])}}" style="color:blue;">Task Assigned To Technician </a></td> 
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                       
                        </div>
                        <div class="tab-pane" id="tab-second">
                              <div class="x_content" style="height: 600px;overflow: scroll;">
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="opentask">
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
                                @foreach($closedserviceorders as $co)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$co->order_id}} 
                                        </td>
                                        <td> {{$co->client_name}}</td>
                                        <td> {{$co->name}}</td>
                                        <td>{{$co->type_name}} </td>
                                        <td> {{$co->address}}</td>
                                        <td> {{$co->technician}}</td>
                                        <td> {{date('d-m-Y', strtotime($co->created_at))}}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                       
                        </div>    
                        <div class="tab-pane" id="tab-fourth">
                            <div class="x_content" style="height: 600px;overflow: scroll;">
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="opentask">
                             
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                   <th>Customer ID</th>
                                    <th>Customer Name</th>
                                      <th>Product Name</th>
                                    
                                    <th>Address</th>
                                 
                                    <th>Service Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($firstservice as $io)
                                    <tr>
                                        <th> {{$i++}}</th>
                                       <td> {{$io->customer_id}}</td>
                                        <td> {{$io->client_name}}</td>
                                        <td> {{$io->name}}</td>
                                        <td> {{$io->address}}</td>
                                        <td> {{date('d-m-Y', strtotime($io->created_at))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>

                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <!-- /page content -->
@endsection

</style>
@section('script')
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable').DataTable();
        } );
    </script>
    <script src="{{asset('backend/plugins/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript">
        $('[data-toggle="start"]').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('[data-toggle="end"]').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection