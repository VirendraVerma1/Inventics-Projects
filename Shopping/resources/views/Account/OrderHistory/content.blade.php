@php
  $counter=1;
@endphp          
          <div class="col-md-14 aside">
            <h1 class="mb-3">Order History</h1>
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-order-history">
                <thead>
                  <tr>
                    <th scope="col"># </th>
                    <th scope="col">Order Number</th>
                    <th scope="col">Order Date </th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Price</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                @php
                  $otimized_date=date('F d, Y' ,strtotime($order->created_at));
                @endphp
                  <tr>
                    <td>{{$counter++}}</td>
                    <td><b>{{$order->order_number}}</b> <a href="{{route('OrderList',$order->id)}}" class="ml-1">View Details</a></td>
                    <td>{{$otimized_date}}</td>
                    <td>{{$order->order_status_name}}</td>
                    <td><span class="color">{{$current_currency}}{{$order->total+0}}</span></td>
                    <td><a href="{{route('reorderMyOrder',$order->id)}}" class="btn btn--grey btn--sm">REORDER</a></td>
                    <td><a href="#" onclick="onCancelOrder({{$order->id}})" class="btn btn--grey btn--sm">CANCEL</a></td>
                  </tr>
                @endforeach
                  <!-- <tr>
                    <td>1</td>
                    <td><b>175525</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>01.02.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$1252.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><b>189067</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>12.02.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$367.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><b>186543</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>03.04.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$587.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><b>209876</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>05.06.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$3654.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><b>215879</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>06.07.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$258.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td><b>229876</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>12.08.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$314.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td><b>268745</b> <a href="{{route('Cart')}}" class="ml-1">View Details</a></td>
                    <td>01.09.2017</td>
                    <td>Shipped</td>
                    <td><span class="color">$522.00</span></td>
                    <td><a href="#" class="btn btn--grey btn--sm">REORDER</a></td>
                  </tr> -->
                </tbody>
              </table>
            </div>
            <div class="text-right mt-2">
              <a href="{{route('clearorderhistory')}}" class="btn btn--alt">Clear History</a>
            </div>
          </div>
     
<script>

function onCancelOrder(order_id)
{
  $.ajax({
      url: "{{route('cancelMyOrder')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        order_uid: order_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          
          if(response=="login")
          window.location = "{{route('login')}}";
          else if(response=="success")
          {
            customLoadAndShowMSG("success","order canceled successfully");
            window.location.reload();
          }
          
        }
  });
}


</script>