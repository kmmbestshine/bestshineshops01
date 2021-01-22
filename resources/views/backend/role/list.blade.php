@extends('backend.layouts.master')
@section('title')
    Role Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Role Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 100px;">
                            <div class="input-group">
                                <a href="{{route('role.create')}}" class="btn btn-success">Create New Role</a>
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
                            <h2>Listing Role</h2>
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
                            <table style="border: 1px solid black" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Role Name</th>
                                    <th>created_date</th>
                                    <th>updated_date</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($role as $m)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td> {{$m->name}}</td>
                                        <td> {{$m->created_at}}</td>
                                        <td> {{$m->updated_at}}</td>
                                        <td><a href="{{route('permission.asign',$m->id)}}" class="btn btn-info"> Asign Permission</a>
                                            {{--<a href="" class="btn btn-info"> Asign Module</a>--}}
                                        </td>
                                        <td>
                                        <div class="row">
                                               {{-- <div class="col-md-5">
                                                    <a href="{{route('user.edit',$us->id)}}" class="btn btn-info "><i class="fa fa-pencil"></i> Edit</a>
                                                </div>--}}
                                              <div class="col-md-5">
                                                <form action="{{ url('role-delete' , $m->id ) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                 <button class="btn btn-danger" type="submit" onclick= "return confirm('are you sure to delete?')"><i class="fa fa-trash-o"></i> Delete</button>
                                            </form>
                                                 
                                                </div>
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
    <!-- /page content -->
@endsection

@section('script')

@endsection