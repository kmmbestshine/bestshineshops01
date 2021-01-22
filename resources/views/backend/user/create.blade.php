@extends('backend.layouts.master')
@section('title')
    User create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
                           {{-- <div class="input-group">
                                <a href="{{route('product.list')}}" class="btn btn-success">View Product</a>
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
                            <h2>Create User</h2>
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
                            <form action="{{route('user.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="Full Name" class="form-control"/>
                                    <span class="error">
                                    @if($errors->has('name'))
                                        {{$errors->first('name')}}
                                    @endif
                                </span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control"/>
                                    <span class="error">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </span>
                                </div>
                                <div class="form-group">
                                    <label for="username">User Name*</label>
                                    <input type="text" name="username" placeholder="Username" class="form-control"/>
                                    <span class="error">
                                        @if($errors->has('username'))
                                            {{$errors->first('username')}}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role*</label>
                                   <select class="form-control" id="role_id" name="role" style="height: 38px; width: 300px" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach($role as $m)
                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
                                    <span class="error">
                                    @if($errors->has('role'))
                                        {{$errors->first('role')}}
                                    @endif
                                </span>
                            </div>
                                <div class="form-group">
                                    <label for="price">Password*</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control"/>
                                    <span class="error">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                    @endif
                                </span>
                                </div>
                                <div class="form-group">
                                    <label for="username">Salary*</label>
                                    <input type="text" name="salary" placeholder="salary" class="form-control"/>
                                    <span class="error">
                                        @if($errors->has('salary'))
                                            {{$errors->first('salary')}}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="radio" name="status" value="1" id="Active" checked=""><label for="Active"> Active</label>
                                    <input type="radio" name="status" id="deactive" value="0"><label for="deactive">DeActive</label>
                                </div>
                                <!-- /.box-body -->
                                <div class="form-actions">
                                    <span class="pull-left"><a href="{{route('user.dashboard')}}" class="flip-link btn btn-info">Back to Dashboard </a></span>
                                    <span class="pull-right"><button type="submit" name="btnSave" class="btn btn-success"> New Registeration</button></span>
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