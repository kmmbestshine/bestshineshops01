@extends('backend.layouts.superadminmaster')
@section('title')
    Company create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Company Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <a href="{{route('role.list')}}" class="btn btn-success">View Role</a>
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
                            <h2>Create Company</h2>
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
                            <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="form-group">
                                   <div class="col-md-6">
                                    
                                <div class="col-md-9">
                                    <label><strong>Company Name:</strong></label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name"/>
                                    <span class="error"><b>
                                           @if($errors->has('company_name'))
                                                {{$errors->first('company_name')}}
                                            @endif</b>
                                     </span>
                                   
                                </div>
                                </div>
                                <div class="col-md-6">
                                   
                                <div class="col-md-9">
                                     <label><strong> Email:</strong></label>
                                    <input type="email" class="form-control" placeholder="Enter Company Email Address" name="company_email"/>
                                    <span class="error"><b>
                                           @if($errors->has('company_email'))
                                                {{$errors->first('company_email')}}
                                            @endif</b>
                                     </span>
                                   
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    
                                <div class="col-md-9">
                                    <label><strong> Contact No</strong></label>
                                    <input type="text" class="form-control" placeholder="Enter Company Contact Number" name="company_mobile"/>
                                    <span class="error"><b>
                                           @if($errors->has('company_mobile'))
                                                {{$errors->first('company_mobile')}}
                                            @endif</b>
                                     </span>
                                    
                                </div>
                                </div>
                                <div class="col-md-6">
                                    
                                <div class="col-md-9">
                                    <label><strong> Address:</strong></label>
                                    <input type="text" class="form-control" placeholder="Enter Company Address" name="company_address"/>
                                    <span class="error"><b>
                                           @if($errors->has('company_address'))
                                                {{$errors->first('company_address')}}
                                            @endif</b>
                                     </span>
                                    
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    
                                <div class="col-md-9">
                                    <label><strong> City:</strong></label>
                                    <input type="text" class="form-control" placeholder="Enter company City" name="company_city"/>
                                    <span class="error"><b>
                                           @if($errors->has('company_city'))
                                                {{$errors->first('company_city')}}
                                            @endif</b>
                                     </span>
                                    
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="col-md-9">
                                    <label><strong> Image:</strong></label>

                                    <input type="file" class="form-control" placeholder="logo" name="company_image"/>
                                    <span class="error"><b>
                                           @if($errors->has('company_image'))
                                                {{$errors->first('company_image')}}
                                            @endif</b>
                                     </span>
                                   
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    
                                <div class="col-md-9">
                                    <label><strong> Plan:</strong></label>
                                    <select name="userplan" id="userplan_change" class="form-control">
                                        <option value="">Select Plan</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Standard">Standard</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                    <span class="error"><b>
                                           @if($errors->has('userplan'))
                                                {{$errors->first('userplan')}}
                                            @endif</b>
                                     </span>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="col-md-9">
                                    <label><strong> Category:</strong></label>
                                    <select name="Categorys" class="form-control">
                                        <option value="0">Demo</option>
                                        <option value="1">Regular</option>
                                        
                                    </select>
                                    <span class="error"><b>
                                           @if($errors->has('Categorys'))
                                                {{$errors->first('Categorys')}}
                                            @endif</b>
                                     </span>
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                    
                                <div class="col-md-12">
                                    <label><strong> Select Modules:</strong></label>
                                            <hr>
                                <div class="newspaper">
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="1" id="some id" /><label for="pizza stuff">Dashboard </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="2" id="some id" /><label for="pizza stuff">User </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="3" id="some id" /><label for="pizza stuff">Module </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="4" id="some id" /><label for="pizza stuff">Role </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="5" id="some id" /><label for="pizza stuff">Permission </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="6" id="some id" /><label for="pizza stuff">Category </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="7" id="some id" /><label for="pizza stuff">Product </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="8" id="some id" /><label for="pizza stuff">Sales </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="10" id="some id" /><label for="pizza stuff">Expenses </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="14" id="some id" /><label for="pizza stuff">Purchase </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="15" id="some id" /><label for="pizza stuff">Bank Transaction </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="16" id="some id" /><label for="pizza stuff">Service Order </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="17" id="some id" /><label for="pizza stuff">Customer </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="19" id="some id" /><label for="pizza stuff">Technician SO </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="20" id="some id" /><label for="pizza stuff">All Reports </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="21" id="some id" /><label for="pizza stuff">Attendance </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="22" id="some id" /><label for="pizza stuff">Advance Salary </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="23" id="some id" /><label for="pizza stuff">Salary </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="24" id="some id" /><label for="pizza stuff">Service Reminder </label></span><br/>
                                <span style="white-space: nowrap;"><input type="checkbox" name="modules[]" value="18" id="some id" /><label for="pizza stuff">Setting </label></span><br/>

                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                <div class="col-md-12">
                                    <label><strong> Select Feature Permissions:</strong></label>
                                    <hr>
                                    <div class="permissions">
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="1" id="some id" /><label for="pizza stuff">Create New User </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="2" id="some id" /><label for="pizza stuff">Module Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="3" id="some id" /><label for="pizza stuff">Module View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="4" id="some id" /><label for="pizza stuff">Module Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="5" id="some id" /><label for="pizza stuff">Module Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="6" id="some id" /><label for="pizza stuff">Role View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="7" id="some id" /><label for="pizza stuff">Role Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="8" id="some id" /><label for="pizza stuff">Permission Asign </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="9" id="some id" /><label for="pizza stuff">Permission Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="10" id="some id" /><label for="pizza stuff">Permission Views </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="11" id="some id" /><label for="pizza stuff">Permission Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="12" id="some id" /><label for="pizza stuff">Permission Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="13" id="some id" /><label for="pizza stuff">category View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="14" id="some id" /><label for="pizza stuff">Category Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="15" id="some id" /><label for="pizza stuff">Category Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="16" id="some id" /><label for="pizza stuff">Category Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="17" id="some id" /><label for="pizza stuff">Product View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="18" id="some id" /><label for="pizza stuff">Product Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="19" id="some id" /><label for="pizza stuff">Product Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="20" id="some id" /><label for="pizza stuff">Product Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="25" id="some id" /><label for="pizza stuff">Sales view </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="26" id="some id" /><label for="pizza stuff">Create Sales </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="30" id="some id" /><label for="pizza stuff">Purchase view </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="31" id="some id" /><label for="pizza stuff">Make new Purchase </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="32" id="some id" /><label for="pizza stuff">pur Confirm Due </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="33" id="some id" /><label for="pizza stuff">Expenses View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="34" id="some id" /><label for="pizza stuff">Expenses Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="35" id="some id" /><label for="pizza stuff">Expenses Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="36" id="some id" /><label for="pizza stuff">Expenses Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="37" id="some id" /><label for="pizza stuff">Exp HeadCreate </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="45" id="some id" /><label for="pizza stuff">User PW Change </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="46" id="some id" /><label for="pizza stuff">Transcation view </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="47" id="some id" /><label for="pizza stuff">Tran BalDepo update </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="48" id="some id" /><label for="pizza stuff">Transaction Entry </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="49" id="some id" /><label for="pizza stuff">Serviceorder-create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="50" id="some id" /><label for="pizza stuff">User View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="51" id="some id" /><label for="pizza stuff">User Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="52" id="some id" /><label for="pizza stuff">User Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="53" id="some id" /><label for="pizza stuff">Role Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="54" id="some id" /><label for="pizza stuff">Customer View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="55" id="some id" /><label for="pizza stuff">Customer Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="56" id="some id" /><label for="pizza stuff">Customer Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="57" id="some id" /><label for="pizza stuff">Customer Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="58" id="some id" /><label for="pizza stuff">Service Order View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="59" id="some id" /><label for="pizza stuff">Service Type Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="60" id="some id" /><label for="pizza stuff">Service Type View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="61" id="some id" /><label for="pizza stuff">Service Type Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="62" id="some id" /><label for="pizza stuff">SO Task </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="63" id="some id" /><label for="pizza stuff">SO Status Update </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="64" id="some id" /><label for="pizza stuff">All Reports View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="65" id="some id" /><label for="pizza stuff">Sales Report View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="66" id="some id" /><label for="pizza stuff">Attendance Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="67" id="some id" /><label for="pizza stuff">Attendance View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="68" id="some id" /><label for="pizza stuff">Attendance Show </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="69" id="some id" /><label for="pizza stuff">Attendance Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="70" id="some id" /><label for="pizza stuff">Attendance Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="71" id="some id" /><label for="pizza stuff">Adv Salary Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="72" id="some id" /><label for="pizza stuff">Adv Salary View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="73" id="some id" /><label for="pizza stuff">Adv Salary Show </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="74" id="some id" /><label for="pizza stuff">Adv Salary Edit </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="75" id="some id" /><label for="pizza stuff">Adv Salary Delete </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="76" id="some id" /><label for="pizza stuff">Salary View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="77" id="some id" /><label for="pizza stuff">GST Create </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="78" id="some id" /><label for="pizza stuff">GST View </label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="79" id="some id" /><label for="pizza stuff">GST Edit</label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="80" id="some id" /><label for="pizza stuff">GST Delete</label></span><br/>
                                    <span style="white-space: nowrap;"><input type="checkbox" name="permissions[]" value="81" id="some id" /><label for="pizza stuff">Sales Carts Create </label></span><br/>
                                  </div>
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                      <div class="col-md-9">
                                    <label><strong> Status:</strong></label>
                                    <select name="companystatus" class="form-control">
                                       <option value="1">Active</option>          
                                        <option value="0">InActive</option>
                                    </select>
                                    <span class="error"><b>
                                           @if($errors->has('companystatus'))
                                                {{$errors->first('companystatus')}}
                                            @endif</b>
                                     </span>
                                </div>
                                </div>
                               <br>
                                <br>
                                </div>
                                <div class="form-group">
                                   
                               <div class="col-md-6">
                                    
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control" placeholder="logo" />
                                    <button type="submit" name="btnCreate" class="btn btn-primary">Save Role</button>
                                </div>
                                </div>
                                
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
<style>
.newspaper {
    -webkit-column-count: 6; /* Chrome, Safari, Opera */
    -moz-column-count: 6; /* Firefox */
    column-count: 6;
}
</style>
<style>
.permissions {
    -webkit-column-count: 6; /* Chrome, Safari, Opera */
    -moz-column-count: 6; /* Firefox */
    column-count: 6;
}
</style>
<script>
    $('.search-dropdown input[type="checkbox"]').on("change", function(){
    var categories = [];
    $('.checkbox:checked').each(function(){        
        var category = $(this).next().text();
        categories.push(category);
    });
    $(".category-holder").html(categories.join(", "));
    if (!$(".category-holder").text().trim().length) {
    $(".category-holder").text("Select Category");
    }
});
</script>
@endsection