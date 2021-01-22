@extends('backend.layouts.master')
@section('title')
   User Listing Page
@endsection
@section('css')
    <link  href="{{asset('backend/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            <div class="text-right">
                            <a href="{{route('user.register')}}" class="btn btn-success btn-rounded">Create User</a>
                            
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
                            <h2>Listing User Deails</h2>
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
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>Email Id</th>
                                    <th>Salary</th>
                                    <th>Last Login</th>
                                     <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($users as $us)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td> {{$us->name}}</td>
                                        <td> {{$us->role_name}}</td>
                                        <td> {{$us->username}}</td>
                                        <td>{{$us->remember_token}} </td>
                                        <td> {{$us->email}}</td>
                                        <td> {{$us->salary}}</td>
                                        <td> {{$us->last_login}}</td>
                                        <td>
                                            @if($us->status == 1)
                                                <span class="label label-success"> Active </span>
                                            @else
                                                <span class="label label-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <a href="{{route('user.edit',$us->id)}}" class="btn btn-info "><i class="fa fa-pencil"></i> Edit</a>
                                                </div>
                                              <div class="col-md-5">
                                                <form action="{{ url('user-delete' , $us->id ) }}" method="POST">
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
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                      {{--  <div class="row">
                            <form action="{{route('custom.report')}}" method="post">
                                {{csrf_field()}}
                                <div class="col-md-3">
                                    <input class="form-control" data-toggle="start" type="text" name="start" placeholder="pick Start Date">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" data-toggle="end" type="text" name="end" placeholder="pick End Date">
                                </div>
                                <div class="col-md-3">
                                    <button name="" class="btn btn-info">Import Report</button>
                                </div>
                            </form>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

</style>
@section('script')
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable').DataTable();
        } );
    </script>
    <script src="{{asset('backend/plugins/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript">
        $('[data-toggle="start"]').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('[data-toggle="end"]').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection