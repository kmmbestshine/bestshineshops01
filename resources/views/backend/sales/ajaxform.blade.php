
<div class="row">
    <div class="col-md-10">
        <form action="{{route('save.sales')}}" method="post">
            {{csrf_field()}}
            <?php $subtot=0; $gsttotal=0; $grandtotal=0; ?>
            @php($i = 0)
            @foreach($salescart as $sc)
                <input type="hidden" name="product_id[{{$i}}]" value="{{$sc->product_id}}">
                <input type="hidden" name="quantity[{{$i}}]" value="{{$sc->quantity}}">
                <input type="hidden" name="customer_id[{{$i}}]" value="{{$sc->customer_id}}">
                <input type="hidden" name="price[{{$i}}]" value="{{$sc->price}}">
                <input type="hidden" name="sales_status[{{$i}}]" value="{{$sc->sales_status}}">
                <input type="hidden" name="warentyEnd[{{$i}}]" value="{{$sc->warenty_end}}">
                @php($i++)
                
                        @php
                        $price = $sc->price ;
                        $subtot += $price;
                        @endphp
                         @php
                        $price1 = $sc->gst_percent * $sc->price /100;
                        $gsttotal += $price1;
                        @endphp
                        @php
                        $price2 = $sc->price + ($sc->gst_percent * $sc->price /100);
                        $grandtotal += $price2;
                        @endphp
            @endforeach
            <input type="hidden" name="total_product" value="{{$i}}">
             <input type="hidden" name="subtot" value="{{$subtot}}">
             <input type="hidden" name="gsttotal" value="{{$gsttotal}}">
             <input type="hidden" name="grandtotal" value="{{$grandtotal}}">
<table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>

    </thead>
    <tbody>
        <tr>

        <td colspan="5">Discount Amount:</td>

        <td >
          <!--  <div style="overflow: hidden">
            <div style="border:1px solid #cccccc; float:left; padding-bottom:1000px; margin-bottom:-1000px" >
                
                <select id = "discount_status" name="discount_status" onchange = "ShowHideDiv1()" >
                   <option value="" selected>No</option>
                   <option value="Y">Yes</option>
                    <option value="N" >Quote</option>
                </select>
            </div>
            <div style="border:1px solid #cccccc; float:right; padding-bottom:1000px; margin-bottom:-1000px">
                <div id="dvPassport1" style="display: none">
                    <input class="form-control numeric-p8d2" type="text" id="txtPassportNumber1" name="amountdiscount" value=0.00 />
                </div>
            </div>
        </div> -->
        <input class="form-control numeric-p8d2" type="text" id="amountdiscount" name="amountdiscount" value=0.00 />
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">Paid Amount:</td>
        <td >
          <!--  <div style="overflow: hidden">
            <div style="border:1px solid #cccccc; float:left; padding-bottom:1000px; margin-bottom:-1000px" >
                
                <select id = "invoice_status" name="invoice_status" onchange = "ShowHideDiv()" >
                   <option value="" selected>Paid</option>
                   <option value="Y">Partial</option>
                     <option value="N" >Quote</option>
                </select>
            </div>
            <div style="border:1px solid #cccccc; float:right; padding-bottom:1000px; margin-bottom:-1000px">
                <div id="dvPassport" style="display: none">
                    <input class="form-control numeric-p8d2" type="text" id="txtPassportNumber" name="amountRecieved" onchange="calculateAmount1(this.value)" value=0.00 />
                </div>
            </div>
        </div>-->
        <input class="form-control numeric-p8d2" type="text" id="txtPassportNumber" name="amountRecieved" onchange="calculateAmount1(this.value)" value=0.00 />
        </td>
        <td></td>
        </tr>
        <tr>
        <td colspan="5">Due/Balance Amount</td>
        <td >
            <input type="text" class="form-control" id="tot_amount" name="due_amount"   readonly>
            
        </td>
        <td></td>
    </tr>
     <tr>
        <td colspan="5">Sales Date</td>
        <td >
            <input type="date" class="form-control"  name="salesdate" >
            
        </td>
        <td></td>
    </tr>
        </tbody>
    </table>                       
<!-- end add bill type -->
<br>
<tr>
<a onclick="printorder()" type="submit" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print Bill</a>
<button type="submit"  class="btn btn-info" target="_blank" onclick="return confirm('Do You Print Out The Bill?')"> Clear Sales Bucket</button>
</tr>        
</form>

    </div>
</div>
<script>
            function calculateAmount1(val) {
                var tot_paid = val;
                
                var gsttotal = document.getElementById('gsttotal').value;
                var discount = document.getElementById('amountdiscount').value;
                
                var subtot = document.getElementById('subtot').value;
                var grandtot =  parseFloat(gsttotal)+parseFloat(subtot)-parseFloat(discount)-parseFloat(tot_paid);

                
                /*display the result*/
                var divobj = document.getElementById('tot_amount');
                divobj.value = grandtot.toFixed(2);
            }
        </script>