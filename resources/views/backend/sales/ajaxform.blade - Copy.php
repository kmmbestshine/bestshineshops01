
<div class="row">
    
    <div class="col-md-11">
        <form action="{{route('save.sales')}}" method="post">
            {{csrf_field()}}
<table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>
    
    </thead>
    <tbody>
        <?php $subtot=0 ?>
                @if($salescart)
                    @foreach($salescart as $s)
                        @php
                        
                        $price = $s->price ;
                        $subtot += $price;
                        @endphp
                    @endforeach
                     <input type="hidden" class="form-control" id="subtot" name="subtot" value="{{$subtot}}"  size="10" >
                @endif
            <?php $gsttotal=0 ?>
                @if($salescart)
                    @foreach($salescart as $s)
                        @php
                        $price = $s->gst_percent * $s->price /100;
                        $gsttotal += $price;
                        @endphp
                    @endforeach
                    <input type="text" class="form-control" id="gsttotal" name="gsttotal" value="{{$gsttotal}}"  size="10" >
                @endif
    
    <tr>
        <td colspan="5">Total Discount</td>
        <td >
            <input type="text" class="form-control" id="discount" name="discount" value="0"  >
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">Total Paid</td>
        <td >
            <input type="text" class="form-control" id="paidamt" name="paidamt"  size="10" onchange="calculateAmount1(this.value)">
            <br>
    
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">Balance Amount1</td>
        <td >
            <input type="number" class="form-control" id="tot_amount" name="tot_amount"  size="6" step="0.25" readonly>
            
        </td>
        <td></td>
    </tr>

    

    </tbody>
</table>
            <?php $total=0; ?>
            @php($i = 0)
            @foreach($salescart as $sc)
                <input type="hidden" name="product_id[{{$i}}]" value="{{$sc->product_id}}">
                <input type="hidden" name="quantity[{{$i}}]" value="{{$sc->quantity}}">
                <input type="hidden" name="unit[{{$i}}]" value="{{$sc->unit}}">
                <input type="hidden" name="price[{{$i}}]" value="{{$sc->price}}">
                <input type="hidden" name="taxvalue[{{$i}}]" value="{{$sc->taxRate}}">
                <input type="hidden" name="saleValue[{{$i}}]" value="{{$sc->saleValue}}">
                <input type="hidden" name="sales_status[{{$i}}]" value="{{$sc->sales_status}}">

                @php($i++)
                
                        @php
                        $price = $sc->saleValue ;
                        $total += $price;
                        @endphp
            @endforeach
            <input type="hidden" name="total_product" value="{{$i}}">
             <input type="hidden" name="grandtotal" value="{{$total}}">

            <br>
           
<br>
<tr>
<a onclick="printorder()" type="submit" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print Bill</a>
<button type="submit"  class="btn btn-info" target="_blank" onclick="return confirm('Do You Print Out The Bill?')"> Clear Sales Bucket1</button>
    </tr>
            
        </form>

    </div>
    <script>
            function calculateAmount1(val) {
                var tot_paid = val;
                alert(subtot);
                var gsttotal = document.getElementById('gsttotal').value;
                var discount = document.getElementById('discount').value;
                var subtot = document.getElementById('subtot').value;
                var grandtot =  parseFloat(gsttotal)+parseFloat(subtot)-parseFloat(discount)-parseFloat(tot_paid);

                
                /*display the result*/
                var divobj = document.getElementById('tot_amount');
                divobj.value = grandtot.toFixed(2);
            }
        </script>
        
    
</div>