@extends('layouts.app')

@section('content')
<br><br>


@if(isset($message))
    <div id="usredini" class="alert alert-dark">
        {{$message}}
        <br>
        <button class="btn btn-primary" onclick='location.href="/"' > ok </button>
    </div>
@else

<table  class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">quantity</th>
        <th scope="col">Size</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <?php
        //sveukupna cijena
        $allPrice = 0;
    ?>

    @foreach($orderItems as $orderItem)

        <!-- provjeriti koja je velicina odabrana -->

        @if($orderItem->quantityXXXL > 0)
            <?php
                $velicina = 'XXXL';
                $kolicina = $orderItem->quantityXXXL;
            ?>
        @endif
        @if($orderItem->quantityXXL > 0)
            <?php
                $velicina = 'XXL';
                $kolicina = $orderItem->quantityXXL;
            ?>
        @endif
        @if($orderItem->quantityXL > 0)
            <?php
                $velicina = 'XL';
                $kolicina = $orderItem->quantityXL;
            ?>
        @endif
        @if($orderItem->quantityL > 0)
            <?php
                $velicina = 'L';
                $kolicina = $orderItem->quantityL;
            ?>
        @endif
        @if($orderItem->quantityM > 0)
            <?php
                $velicina = 'M';
                $kolicina = $orderItem->quantityM;
            ?>
        @endif
        @if($orderItem->quantityS > 0)
            <?php
                $velicina = 'S';
                $kolicina = $orderItem->quantityS;
            ?>
        @endif
        @if($orderItem->quantityXS > 0)
            <?php
                $velicina = 'XS';
                $kolicina = $orderItem->quantityXS;
            ?>
        @endif


        <?php
            //pokupiti id itema koji se nalazi u korpi
            $item = App\item::find($orderItem->item_id);
        ?>

            <tbody>

            <tr>

                <!-- IME -->
                <td>
                    <a href="/product/{{$item->id}}">
                        {{$item->name}}
                    </a>
                </td>

                <!-- Cijena  treba pomnozit sa quantity -->
                <td>
                   {{($item->price)*$kolicina}} €
                   <?php
                    //dodaj u sveukupnu cijenu
                        $allPrice += $item->price*$kolicina
                   ?>
                </td>

                <!-- quantity -->
                <td>
                    {{$kolicina}}
                </td>

                <!-- size -->
                <td>
                    {{$velicina}}
                </td>

                <!-- UREDU KORISNIKA -->
                <td style="float:right;">
                    <button class="btn btn-primary"> remove </button>
                </td>
            </tr>


            </tbody>

    @endforeach
</table>

<div id="global">
    <p> Total Price : {{$allPrice}} € </p>

    <button class="btn btn-primary" onclick="location.href='/buyAll';" > Buy All </button>
</div>

@endif


@endsection
