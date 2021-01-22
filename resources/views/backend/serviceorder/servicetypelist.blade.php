@extends('backend.layouts.master')
@section('title')
    Service Type Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Service Type Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 50px;">
                            <div class="input-group">
                                <a href="{{route('serviceorder.list')}}" class="btn btn-success">Create Service Order</a>
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
                            <h2>Listing Service Type</h2>
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
                                    <th>Service Type Name</th>
                                    <th>Slug</th>
                                    <th>status</th>
                                    <th>created_by</th>
                                    <th>modified_by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($servicetypes as $st)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td> <b>{{$st->type_name}}</b></td>
                                        <td> {{$st->slug}}</td>
                                        <td>
                                            @if($st->status == 1)
                                                <span class="label label-success"> Active </span>
                                            @else
                                                <span class="label label-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td> {{$st->created_by}}</td>
                                        <td> {{$st->modified_by}}</td>
                                        <td>
                                            <div class="row">
                                               {{-- <div class="col-md-4">
                                                    <a href="{{route('productcategory.edit',$st->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                                </div>--}}
                                                <div class="col-md-4">
                                                    <form action="{{ url('servicetype-delete' , $st->id ) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                 <button class="btn btn-danger" type="submit" onclick= "return confirm('are you sure to delete?')"><i class="fa fa-trash-o"></i> Delete</button>
                                            </form>
                                                </div>
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