
@extends('backend.layouts.master')
@section('title')
    Salary Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Salary </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 70px;">
                          {{--  <div class="input-group">
                                <a href="{{route('Advsalary.advsalary.create')}}" class="btn btn-success">Create Advanced Salary</a>
                            </div> --}}
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
                            <h2>Listing Salary</h2>
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
                        <div class="x_content">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h3 class="card-title">PAY SALARIES LISTS <small class="text-danger pull-right">{{ date('F Y') }}</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="height: 600px;overflow: scroll;">
                                <table id="example1" style="border: 1px solid black" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Employee Name</th>
                                       <!-- <th>Photo</th>-->
                                        <th>Salary</th>
                                        <th>Month</th>
                                        <!-- <th>Advanced</th>-->
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Employee Name</th>
                                         <!-- <th>Photo</th>-->
                                          <th>Salary</th>
                                        <th>Month</th>
                                       <!-- <th>Advanced</th>-->
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($employees as $key => $employee)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                          <!--  <td>
                                                <img class="img-rounded" style="height:35px; width: 35px;" src="" alt="{{ $employee->name }}">
                                            </td>-->
                                            <td>{{ date('F', strtotime('-1 month')) }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>
                                                <a class="btn btn-info text-white">
                                                    Pay Now
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
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