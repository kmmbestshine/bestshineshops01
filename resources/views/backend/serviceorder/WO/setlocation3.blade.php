<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Location Tracking</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body onload="getLocation()">

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Is it your Location ??
                </div>

                <div id="result"></div>

            </div>
        </div>


        <script>
            var x;

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                

                $.post('{{ route('location') }}', {

                    '_token': "{{ csrf_token() }}",

                    latitude:position.coords.latitude,
                    longitude:position.coords.longitude,

                }, function (data) {
                    
                    var address         =  '<div class="links"><strong>'+data.address+'</strong></div>';
                    var district        =  '<div class="links"><strong>'+data.district+'</strong></div>';
                    var full_address    =  '<div class="links"><strong>'+data.full_address+'</strong></div>';
                    var division        =  '<div class="links"><strong>'+data.division+'</strong></div>';

                    $('#result').html(address+district+full_address+division);
                });
            }
        </script>

    </body>
</html>
