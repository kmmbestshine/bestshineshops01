@extends('backend.layouts.master')
@section('title')
   Sales Report Listing Page
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
                    <h3>Sales Report </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 100px;">
                            <div class="input-group">
                                <a href="{{route('reports.list')}}" class="btn btn-success">Back Space</a>
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
                            <h2>Listing sales Report</h2>
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
                        <div class="row">
                            <form action="{{route('sales.reportpost')}}" method="post">
                                {{csrf_field()}}
                                <div class="col-md-3">
                                    <input class="form-control" data-toggle="start" type="text" name="start" placeholder="pick Start Date" required>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" data-toggle="end" type="text" name="end" placeholder="pick End Date" required>
                                </div>
                                <div class="col-md-3">
                                    <button name="" class="btn btn-info">Get Sales Report</button>
                                </div>
                            </form>
                        </div>
                        <div class="x_content" style="height: 600px;overflow: scroll;">
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Client Name</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Sales status</th>
                                    <th>GST%</th>
                                    <th>GST Value</th>
                                    <th>Price</th>
                                    <th>Grand Total</th>
                                    <th>sales Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($salesreport as $pc)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$pc->client_name}} </td>
                                        <td>{{$pc->product_name}} </td>
                                        <td> {{$pc->quantity}}</td>
                                        <td>
                                            @if($pc->sales_status == 1)
                                                <span class="label label-success"> cash </span>
                                            @else
                                                <span class="label label-danger"> credit </span>
                                            @endif
                                        </td>
                                        <td>{{$pc->gst_percent}}%</td>
                                        <td>@php$gstval=($pc->gst_percent * $pc->price) /100;  @endphp{{$gstval}} </td>
                                        <td> {{$pc->price}}</td>
                                        <td> {{$pc->grand_total}}</td>
                                        <td> {{$pc->created_at}}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">Grand Total</td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($salesreport)
                                            @foreach($salesreport as $s)
                                                @php
                                                    $gstval=($s->gst_percent * $s->price) /100;
                                                    $total += $gstval;
                                                @endphp
                                            @endforeach
                                            {{$total}}
                                        @endif
                                    </td>
                                    <td><?php $pricetotal=0 ?>
                                        @if($salesreport)
                                            @foreach($salesreport as $ps)
                                                @php
                                                    $price= $ps->price;
                                                    $pricetotal += $price;
                                                @endphp
                                            @endforeach
                                            {{$pricetotal}}
                                        @endif</td>
                                    <td><?php $grandtotal=0 ?>
                                        @if($salesreport)
                                            @foreach($salesreport as $gs)
                                                @php
                                                $gstvalue=($gs->gst_percent * $gs->price) /100;
                                                $grand= $gs->price;
                                                    $grand= $gstvalue + $grand;
                                                    $grandtotal += $grand;
                                                @endphp
                                            @endforeach
                                            {{$grandtotal}}
                                        @endif</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
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