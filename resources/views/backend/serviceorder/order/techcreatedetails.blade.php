@extends('backend.layouts.master')
@section('title')
    Service Order Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Service Order </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                          {{--  <div class="text-right">
                                <a href="{{route('product.create')}}" class="btn btn-success">Create Product</a>
                                <a href="{{route('gst.create')}}" class="btn btn-success"> Create GST</a>
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
                            
                        <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h2>Custome Details</h2>
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Customer No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Land Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($customer as $ct)
                                    <tr>
                                        <td>{{$ct->customer_id}} </td>
                                        <td>{{$ct->client_name}} </td>
                                        <td>{{$ct->address}} </td>
                                        <td> {{$ct->landmark}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                             <h2>Sales Details</h2>
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Sold Date</th>
                                    <th>Warenty Start Date</th>
                                    <th>Warenty End Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($sales as $sa)
                                    <tr>
                                        <td>{{$sa->name}} </td>
                                        <td>{{$sa->sales_date}} </td>
                                        <td>{{$sa->sales_date}} </td>
                                        <td> {{$sa->warenty_end}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="x_content">
                            <form action="{{route('service.order.tech.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="servive_type">Service Type*</label>
                                    <select id = "service_type" name="service_type" class="form-control" required>
                                           <option value="" selected>Select Service Type</option>
                                           @foreach($servicetypes as $st)
                                           <option value="{{$st->id}}">{{$st->type_name}}</option>
                                           <!-- <option value="N" >Quote</option>-->
                                           @endforeach
                                        </select>
                                        <span class="error"><b>
                                           @if($errors->has('customer_no'))
                                                {{$errors->first('customer_no')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="contact_no">Product Name*</label>
                                    <select id = "product_id" name="product_id" class="form-control" required>
                                           <option value="" selected>Select Product</option>
                                           @foreach($sales as $sp)
                                           <option value="{{$sp->product_id}}">{{$sp->name}}</option>
                                           <!-- <option value="N" >Quote</option>-->
                                           @endforeach
                                        </select>
                                      <span class="error"><b>
                                           @if($errors->has('contact_no'))
                                                {{$errors->first('contact_no')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="contact_no">Contact No</label>
                                    <input type="text" class="form-control" id="contact_no" name="contact_no"
                                           placeholder="Enter Contact No">
                                      <span class="error"><b>
                                           @if($errors->has('contact_no'))
                                                {{$errors->first('contact_no')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"  placeholder="Enter Complaint Details"></textarea>
                                      <span class="error"><b>
                                           @if($errors->has('description'))
                                                {{$errors->first('description')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                            
                                            @foreach($customer as $cust)
                                            <input type="hidden" class="form-control" id="customer_id" name="customer_id"
                                            value="{{$cust->customer_id}}">
                                                   
                                            @endforeach
                                            
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save Service Order</button>
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
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable').DataTable();
        } );
    </script>
@endsection