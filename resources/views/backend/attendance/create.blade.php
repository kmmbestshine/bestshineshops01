@extends('backend.layouts.master')
@section('title')
    Attendance Take Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Attendance Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 90px;">
                            <div class="input-group">
                                <a href="{{route('backend.attendance.index')}}" class="btn btn-success">View Attendance</a>
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
                            <h2>Take Attendance</h2>
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
                            <form role="form" action="{{ route('backend.attendance.store') }}" method="post">
                                {{ csrf_field()}}
                                <div class="card-body">
                                    <h2 class="text-center my-4 text-bold text-primary">Today : {{ date('d F Y') }}</h2>
                                    <div class="row" style="height: 600px;overflow: scroll;">
                                        <table style="border: 1px solid black" class="table table-striped table-bordered table-hover"> 
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Name</th>
                                                  <!--  <th>Photo</th> -->
                                                    <th>Attendance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="{{ route('backend.attendance.store') }}" method="post">
                                                    {{ csrf_field()}}
                                                    @foreach($employees as $key => $employee)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $employee->name }}</td>
                                                         <!--   <td>
                                                                <img width="40" height="40" class="img-fluid img-rounded" src="{{ URL::asset('storage/employee/'. $employee->photo) }}" alt="{{ $employee->name }}">
                                                            </td> -->
                                                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                                            <td>
                                                                <input type="radio" name="attendance[{{ $employee->id }}]" value="1" required>Present
                                                                <input type="radio" name="attendance[{{ $employee->id }}]" value="0">Absent
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </form>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Take Attendance</button>
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

@endsection