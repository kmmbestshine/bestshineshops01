@extends('backend.layouts.master')
@section('title')
    Customer create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Customer Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
                            <div class="input-group">
                                <a href="{{route('customer.list')}}" class="btn btn-success">View Customer</a>
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
                            <h2>Create Customer</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                        <div class="x_content">
                            <form action="{{route('customer.store')}}" method="post">
                                {{ csrf_field()}}
                                
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
                                <div class="form-group">
                                    <label for="gsttin">GST No</label>
                                    <input type="text" class="form-control" id="gsttin" name="gsttin" placeholder="Enter GST No">
                                    <span class="error"><b>
                                           @if($errors->has('gsttin'))
                                                {{$errors->first('gsttin')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                    <span class="error"><b>
                                           @if($errors->has('email'))
                                                {{$errors->first('email')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address*</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                    <span class="error"><b>
                                           @if($errors->has('address'))
                                                {{$errors->first('address')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="landmark">Land Mark</label>
                                    <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Land Mark">
                                    <span class="error"><b>
                                           @if($errors->has('landmark'))
                                                {{$errors->first('landmark')}}
                                            @endif</b>
                                     </span>
                                </div>
                                
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="radio" name="status" value="1" id="Active" checked=""><label for="Active"> Active</label>
                                    <input type="radio" name="status" id="deactive" value="0"><label for="deactive">DeActive</label>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save Customer</button>
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
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            var $foo = $('#name');
            var $bar = $('#slug');
            function onChange() {
                $bar.val($foo.val().replace(/\s+/g, '-').toLowerCase());
            };
            $('#name')
                .change(onChange)
                .keyup(onChange);
        });
    </script>
@endsection