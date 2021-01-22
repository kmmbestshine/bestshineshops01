@extends('backend.layouts.master')
@section('title')
   Make Customer Listing Page
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
                    <h3>Customer Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            <div class="text-right">
                                <a href="{{route('create.customer')}}" class="btn btn-success btn-rounded">New Customer</a>
                               {{-- <a href="{{route('servicetype.list')}}" class="btn btn-success btn-rounded">View Service Type</a>
                                <a href="{{route('expenses.create')}}" class="btn btn-success btn-rounded">New Service Order</a>
                                --}}
                                
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
                            <h2>Listing Customer Deails</h2>
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
                        <div class="x_content" style="height: 600px;overflow: scroll;">
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Customer Name</th>
                                    <th>Customer ID</th>
                                    <th>GST Tin</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Land Mark</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($customer as $ct)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$ct->client_name}} </td>
                                        <td> {{$ct->customer_id}}</td>
                                        <td>{{$ct->gst_tin}} </td>
                                        <td> {{$ct->phone}}</td>
                                        <td> {{$ct->email}}</td>
                                        <td>{{$ct->address}} </td>
                                        <td> {{$ct->landmark}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <a href="{{route('customer.edit',$ct->id)}}" class="btn btn-info "><i class="fa fa-pencil"></i> Edit</a>
                                                </div>
                                                <div class="col-md-5">
                                                    <form action="{{ url('customer-delete' , $ct->id ) }}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                        <button class="btn btn-danger" type="submit" onclick= "return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                
                                </tfoot>
                            </table>
                        </div>
                       {{-- <div class="row">
                            <form action="{{route('custom.report')}}" method="post">
                                {{csrf_field()}}
                                <div class="col-md-3">
                                    <input class="form-control" data-toggle="start" type="text" name="start" placeholder="pick Start Date">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" data-toggle="end" type="text" name="end" placeholder="pick End Date">
                                </div>
                                <div class="col-md-3">
                                    <button name="" class="btn btn-info">Import Report</button>
                                </div>
                            </form>
                        </div>--}}
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