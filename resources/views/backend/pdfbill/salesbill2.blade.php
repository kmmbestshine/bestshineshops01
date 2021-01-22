<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
    @media print 
{
    @page {
      size: A4; /* DIN A4 standard, Europe */
      margin:0;
    }
    html, body {
        width: 210mm;
        /* height: 297mm; */
        height: 282mm;
        font-size: 11px;
        background: #FFF;
        overflow:visible;
    }
    body {
        padding-top:15mm;
    }
}

    </style>
    <title>Document</title>
</head><body>
 <div class="receipt-main col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2" id="paymentRecipt">
<p align="center"><strong>Aqua Tech RO System</strong></p>
<p align="center">Pudukottai</p>
<p align="center">PH: 9942357563</p>
<p align="center">PAN No: </p>
<hr>
<p>Date: {{date("d-m-Y h:i:sa")}}</p>
<hr>
<table border="0" align="center">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>GST</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($report as $all)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$all->name}}</td>
        <td>{{$all->quantity}}</td>
        <td>{{$all->gst_percent}}</td>
        <td>{{$all->price}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4"> Sub Total </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->price;
                        $total += $price;
                    @endphp
                @endforeach
                {{$total}}
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="4">GST Total</td>
        <td>
            <?php $gsttotal=0 ?>
                @if($report)
                    @foreach($report as $s)
                        @php
                        $price = $s->gst_percent * $s->price /100;
                        $gsttotal += $price;
                        @endphp
                    @endforeach
                    {{$gsttotal}}
                @endif
        </td>
    </tr>
    <tr>
         <td colspan="4">Grand Total</td>
        <td>
            <?php $grandtotal=0 ?>
                @if($report)
                    @foreach($report as $s)
                        @php
                        
                        $price = $s->price + ($s->gst_percent * $s->price /100);
                        $grandtotal += $price;
                        @endphp
                    @endforeach
                    <hr>
                   Rs.{{$grandtotal}}
                   <hr>
                @endif
        </td>
    </tr>
    </tbody>
</table>
<br>
<p>prepared by: {{$all->saller_name}} </p>
<p align="center">Thank You</p>

<div class="form-actions">
<span class="pull-left"><button onclick="window.print()" class="flip-link btn btn-info">Print Bill</button></span>
 <span class="pull-right"><a href="{{route('user.dashboard')}}" class="flip-link btn btn-info">Back </a></span>
</div>
</body>
</div>
</html>


