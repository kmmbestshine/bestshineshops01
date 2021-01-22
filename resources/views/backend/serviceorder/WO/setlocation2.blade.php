@extends('backend.layouts.master')
@section('title')
    Work Order Assign  create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Work Order Assign To Technician </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 75px;">
                            <div class="input-group">
                                <a href="{{route('servicetype.list')}}" class="btn btn-success">View Service Type</a>
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
                            <h2>Assign Work Order</h2>
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
                            <button type="button" id="toggleWatchBtn">Start Watching</button>
    <div id="result">
        <!--Position information will be inserted here-->
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

<script>
    // Set global variable
    var watchID;

    function showPosition() {
        if(navigator.geolocation) {
            watchID = navigator.geolocation.watchPosition(successCallback);
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }

    function successCallback(position) {
        toggleWatchBtn.innerHTML = "Stop Watching";
        
        // Check position has been changed or not before doing anything
        if(prevLat != position.coords.latitude || prevLong != position.coords.longitude){
            
            // Set previous location
            var prevLat = position.coords.latitude;
            var prevLong = position.coords.longitude;
            
            // Get current position
            var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
            document.getElementById("result").innerHTML = positionInfo;
            
        }
        
    }

    function startWatch() {
        var result = document.getElementById("result");
        
        var toggleWatchBtn = document.getElementById("toggleWatchBtn");
        
        toggleWatchBtn.onclick = function() {
            if(watchID) {
                toggleWatchBtn.innerHTML = "Start Watching";
                navigator.geolocation.clearWatch(watchID);
                watchID = false;
            } else {
                toggleWatchBtn.innerHTML = "Aquiring Geo Location...";
                showPosition();
            }
        }
    }
    
    // Initialise the whole system (above)
    window.onload = startWatch;
</script>


@endsection