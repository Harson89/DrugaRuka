@extends('layouts.app')

@section('content')

<?php
    $categories = App\category::all();
?>


<!-- <img src="images/test2.png" alt="Mountain"> -->

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
        <div id="errorMessages" class="alert alert-success" style="text-align:center; word-wrap:break-word;">
            {{Session::get('successMessage')}}
        </div>
    @endif
</div>

<div id="usredini">
    <!--FORM -->
    <form action="{{ URL::to('additemExecute') }}" method="post" enctype="multipart/form-data">


    {{ csrf_field() }}

    <!-- product name -->
    {{Form::text('itemName','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Item Name'])}}

    <!-- description -->
    {{Form::textarea('description','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Description', 'rows'=>'3', 'cols'=>'2'] )}}

    <!-- CATEGORY ID -->
    <select class="form-control" name="category_id">
        @foreach ($categories as $category)
            <option value ={{$category->id}}> {{$category->name}} </option>
        @endforeach
    </select>
    <br>
    <!-- price -->
    <span> Price </span>
    {!! Form::number('price', '0.0', ['required'=>'required','min' => '0.01', 'step'=>'any', 'class' => 'text-center form-control']) !!}
    <br>
    <br>
    <!-- GENDER -->
    <select class="form-control" name="gender">
            <option value=1 > unisex </option>
            <option value=2 > male </option>
            <option value=3 > female </option>
            <option value=4 > kids </option>
    </select>

    <br>

    <!-- XXXL -->
        <span> XXXL QUANTITY </span>
        {{ Form::input('number', 'quantityXXXL', '0', ['class' => 'form-control']) }}
        <br>

    <!-- XXL -->
    <span> XXL QUANTITY </span>
    {{ Form::input('number', 'quantityXXL', '0', ['class' => 'form-control']) }}
    <br>

    <!-- XL -->
    <span> XL QUANTITY </span>
    {{ Form::input('number', 'quantityXL', '0', ['class' => 'form-control']) }}
    <br>

    <!-- L -->
    <span> L QUANTITY </span>
    {{ Form::input('number', 'quantityL', '0', ['class' => 'form-control']) }}
    <br>

    <!-- M -->
    <span> M QUANTITY </span>
    {{ Form::input('number', 'quantityM', '0', ['class' => 'form-control']) }}
    <br>

    <!-- S -->
    <span> S QUANTITY </span>
    {{ Form::input('number', 'quantityS', '0', ['class' => 'form-control']) }}
    <br>

    <!-- XS -->
    <span> XS QUANTITY </span>
    {{ Form::input('number', 'quantityXS', '0', ['class' => 'form-control']) }}
    <br>


    <!-- picture upload -->
    <div class="form-control">
        <label for="author">Picture:</label>
        <input type="file" name="file" id="file">
    </div>
    <br>

    <!-- submit -->
    {{Form::submit('send',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>

@endsection
