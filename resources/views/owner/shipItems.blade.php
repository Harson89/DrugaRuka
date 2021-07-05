@extends('layouts.app')

@section('content')

<div id="usredini">
    @if(isset($message))
        <div  class="alert alert-dark">
            {{$message}}
            <br>
            <button class="btn btn-primary" onclick='location.href="/"' > ok </button>
        </div>
    @else

        @foreach($orders as $order)

            <div id="order">
                <p> First Name: {{$order->firstName}} </p>
                <p> Last Name: {{$order->lastName}} </p>
                <p> City: {{$order->city}} </p>
                <p> Address: {{$order->address}} </p>
                <p> Zip code: {{$order->zip}} </p>
                <p> Price: {{$order->price}} € </p>

                <div id="itemsInOrders">
                    <p> <strong> Products to Ship </strong> </p>

                    <!-- pokupit podatke o orders items -->
                    <?php
                        $orderItems = App\orders_item::where('order_id',$order->id)->get();
                    ?>

                    <!-- pomocu id iz orderItems provuc items kroz foreach-->
                    @foreach($orderItems as $orderItem)

                        <!-- povuc id od itema -->
                        <?php
                            $item_id = $orderItem->item_id;

                            //pronac kolicinu
                            if($orderItem->quantityXXXL != 0){
                                $orderQuantity = $orderItem->quantityXXXL;
                                $size = 'XXXL';
                            }

                            //povuc podatke o itemu
                            $item = App\item::find($item_id);
                        ?>

                        <p> Name: <a href="/product/{{$item->id}}"> {{$item->name}} </a> x {{$orderQuantity}} </p>
                        <p> Size {{$size}} </p>
                            <br>


                    @endforeach

                </div>
                <br>

                {{ Form::open(array('url' => '/shipitemsExecute')) }}


                    <input name="orderID" value="{{$order->id}}" type="hidden">

                    {{Form::submit('Shipped',['class'=>'btn btn-primary'])}}

                {{ Form::close() }}

                <br>

            </div>


        @endforeach
    @endif
        </div>

@endsection
