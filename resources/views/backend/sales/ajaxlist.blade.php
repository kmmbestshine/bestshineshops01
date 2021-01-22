
<table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Qty</th>
        <th>GST %</th>
        <th>GST Rs</th>
        <th>ProductPrice</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1;  ?>
    @foreach($sales as $pc)
        <tr>
            <th> {{$i++}}</th>
            <td>{{$pc->name}} </td>
            <td> {{$pc->quantity}}</td>
            <td>{{$pc->gst_percent}} </td>
            <td>{{$pc->gst_percent * $pc->price /100}} </td>
            <td >{{$pc->price}} </td>
            <td>
                <form action="{{route('salescart.delete' ,[$pc->id,$pc->product_id])}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i></button>
                </form></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5">Sub Total</td>
        <td>
            <?php $subtot=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        
                        $price = $s->price ;
                        $subtot += $price;
                        @endphp
                    @endforeach
                     <input type="text" class="form-control" id="subtot" name="subtot" value="{{$subtot}}"  readonly >
                @endif
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">GST Total</td>
        <td>
            <?php $gsttotal=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $price = $s->gst_percent * $s->price /100;
                        $gsttotal += $price;
                        @endphp
                    @endforeach
                    <input type="text" class="form-control" id="gsttotal" name="gsttotal" value="{{$gsttotal}}"  size="10" readonly>
                @endif
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">Grand Total</td>
        <td>
            <?php $grandtotal=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        
                        $price = $s->price + ($s->gst_percent * $s->price /100);
                        $grandtotal += $price;
                        @endphp
                    @endforeach
                    <input type="text" class="form-control" id="grandtotal" name="grandtotal" value="{{$grandtotal}}"  size="10" readonly>
                @endif
        </td>
        <td></td>
    </tr>
   <!-- <tr>
        <td colspan="5">Total Discount</td>
        <td >
            <input type="text" class="form-control" id="discount" name="discount" value="0"  size="10">
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">Total Paid</td>
        <td >
            <input type="text" class="form-control" id="paidamt" name="paidamt"  size="10" onchange="calculateAmount(this.value)">
            <br>
    
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5">Balance Amount</td>
        <td >
            <input type="text" class="form-control" id="tot_amount" name="tot_amount"  size="10" readonly>
            
        </td>
        <td></td>
    </tr> -->
    </tbody>
</table>


