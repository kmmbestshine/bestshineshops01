@extends('backend.layouts.master')
@section('title')
    Update Attendance Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Attendance </h3>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                           
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
                             <div class="card card-info">
                            
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('backend.attendance.att_update') }}" method="post">
                                {{ csrf_field()}}
                                <div class="card-body">
                                    <h2 class="text-center my-4 text-bold text-primary">Date : {{ date('l, d F Y', strtotime($date)) }}</h2>
                                    <div class="row">
                                        <table class="table table-striped table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Name</th>
                                               {{--  <th>Photo</th> --}}
                                                <th>Attendance</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           
                                              
                                                @foreach($attendances as $key => $attendance)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $attendance->name }}</td>
                                                       {{-- <td>
                                                            <img width="40" height="40" class="img-fluid img-rounded" src="{{ URL::asset('storage/employee/'. $attendance->photo) }}" alt="{{ $attendance->name }}">
                                                        </td> --}}
                                                        <input type="hidden" name="id[]" value="{{ $attendance->id }}">
                                                        <td>
                                                            <input type="radio" name="attendance[{{ $attendance->id }}]" value="1" {{ $attendance->attendance == 1 ? 'checked' : '' }} required>Present
                                                            <input type="radio" name="attendance[{{ $attendance->id }}]" value="0" {{ $attendance->attendance == 0 ? 'checked' : '' }}>Absent
                                                        </td>
                                                    </tr>
                                                @endforeach
                                           
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Update Attendance</button>
                                </div>
                            </form>
                        </div>
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