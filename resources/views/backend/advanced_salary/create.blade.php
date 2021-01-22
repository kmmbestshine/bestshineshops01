@extends('backend.layouts.master')
@section('title')
    Advanced Salary Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Advanced Salary</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 90px;">
                            <div class="input-group">
                                <a href="{{route('backend.advanced_salary.index')}}" class="btn btn-success">View Advanced Salary</a>
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
                            <div class="card-header">
                                <h3 class="card-title">Create Advanced Salary</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('backend.advanced_salary.store') }}" method="post" enctype="multipart/form-data">
                               {{ csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <select name="employee_id" class="form-control">
                                                    <option value="" disabled selected>Select an Employee</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Month</label>
                                                <select name="month" class="form-control">
                                                    <option value="" selected disabled>Select a month</option>
                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="april">April</option>
                                                    <option value="may">May</option>
                                                    <option value="june">June</option>
                                                    <option value="july">July</option>
                                                    <option value="august">August</option>
                                                    <option value="september">September</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Year</label>
                                                <input type="text" class="form-control" name="year" value="{{ old('year') }}" placeholder="Enter Year">
                                            </div>
                                            <div class="form-group">
                                                <label>Advanced Salary</label>
                                                <input type="text" class="form-control" name="advanced_salary" value="{{ old('advanced_salary') }}" placeholder="Enter Advanced Salary">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Create Advanced Salary</button>
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