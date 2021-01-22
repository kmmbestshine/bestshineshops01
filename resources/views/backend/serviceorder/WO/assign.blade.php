@extends('backend.layouts.master')
@section('title')
    Work Order Assign  create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Work Order Assign To Technician </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 75px;">
                            <div class="input-group">
                                <a href="{{route('servicetype.list')}}" class="btn btn-success">View Service Type</a>
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
                            <h2>Assign Work Order</h2>
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
                            <form action="{{route('workorder.assign.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="staff_name">Name*</label>
                                    <select id = "staff_name" name="staff_name" class="form-control">
                                           <option value="" selected>Select Staff</option>
                                            @foreach($users as $user)
                                           <option value="{{$user->name}}">{{$user->name}}</option>
                                           <!-- <option value="N" >Quote</option>-->
                                           @endforeach
                                        </select>
                                    
                                    
                                </div>
                                
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" class="form-control" id="order_id" name="order_id" value="{{$order_id}}">
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