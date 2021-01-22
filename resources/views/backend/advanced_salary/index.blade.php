
@extends('backend.layouts.master')
@section('title')
    Advance Salary Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Advance Salary Management</h3>
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
                            <h2>Listing Advance Salary</h2>
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
                            <div class="card-body" style="height: 600px;overflow: scroll;">
                                <table id="example1" style="border: 1px solid black" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Employee Name</th>
                                         <!--  <th>Photo</th> -->
                                        <th>Month</th>
                                        <th>Year</th>
                                         <th>Salary</th> 
                                        <th>Advanced Salary</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Employee Name</th>
                                         <!--  <th>Photo</th> -->
                                        <th>Month</th>
                                        <th>Year</th>
                                         <th>Salary</th> 
                                        <th>Advanced Salary</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    @foreach($advanced_salaries as $key => $salary)
                                    
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $salary->name }}</td>
                                            <!-- <td>
                                                <img class="img-rounded" style="height:35px; width: 35px;" src="" alt="{{ $salary->name }}">
                                            </td> -->
                                            <td>{{ ucfirst($salary->month) }}</td>
                                            <td>{{ $salary->year }}</td>
                                             <td>{{ $salary->salary }}</td>
                                            <td>{{ $salary->advanced_salary }}</td>
                                            <td>
                                              <a href="{{ route('backend.advanced_salary.show', $salary->id) }}" class="btn btn-success">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                 <a href="{{ route('backend.advanced_salary.edit', $salary->id) }}" class="btn
                                                    btn-info">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <button class="btn btn-danger" type="button" onclick="deleteItem({{ $salary->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <form id="delete-form-{{ $salary->id }}" action="{{ route('backend.advanced_salary.destroy', $salary->id) }}" method="post"
                                                      style="display:none;">
                                                    {{ csrf_field()}}
                                                </form> 
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