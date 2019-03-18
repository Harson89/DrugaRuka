@extends('layouts.app')

@section('content')

<div id=usredini>
        <!-- ispis svih errora sa forme -->
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div id="errorMessages" class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif

        <!-- Poruka u uspiješno poslanoj formi -->
        @if(Session::has('successMessage'))
            <div id="errorMessages" class="alert alert-dark" style="text-align:center; word-wrap:break-word;">
                {{Session::get('successMessage')}}
            </div>
        @endif



    </div>


    <div id="lijevi">
        <img id="slikaProdukta" src="{{ URL::to('images') }}/{{ $product->picture}}" alt="error">
    </div>

    <div id="desni">

    <div id="imeProdukta">
        {{$product->name}}
    </div>

    <br>

    <span> Price </span>
        {{$product->price}} €


    <p>
        @if($product->gender == 1)
            Gender: Unisex
        @endif

        @if($product->gender == 2)
            Gender: Male
        @endif

        @if($product->gender == 3)
            Gender: Female
        @endif

        @if($product->gender == 4)
            Gender: Kids
        @endif

    </p>

    <span> Description: </span>
    <br>
    {{$product->description}}

    <br><br>

    {{ Form::open(array('url' => '/addToCart')) }}

        <!-- VELICINA -->
        <span> Choose Size </span>
        <select class="form-control" name="size">
                <option value=1 > XXXL </option>
                <option value=2 > XXL </option>
                <option value=3 > XL </option>
                <option value=4 > L </option>
                <option value=5 > M </option>
                <option value=6 > S </option>
                <option value=7 > XS </option>
        </select>

        <br>



        <span> Choose Quantity </span>
        {{ Form::input('number', 'quantity', '1', ['class' => 'form-control', 'min'=>1]) }}

        <br>


        <input name="product_id" value="{{$product->id}}" type="hidden">

        {{Form::submit('Add to Cart',['class'=>'btn btn-primary'])}}

    {{ Form::close() }}



    </div>

@endsection
