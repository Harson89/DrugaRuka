@extends('layouts.app')


@section('content')

    <div id="usredini">
        <h1> Shipping informations </h1>

        {{ Form::open(array('url' => '/buyAllExecute')) }}

            <!-- IME -->
            {{Form::text('firstName','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'First Name'])}}

            <br>

            <!-- PREZIME -->
            {{Form::text('lastName','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Last Name'])}}

            <br>

            <!-- City -->
            {{Form::text('city','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'City'])}}

            <br>

            <!-- Adress -->
            {{Form::text('address','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'adress'])}}

            <br>

            <!-- ZIP -->
            {{Form::number('zip','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'zip'])}}

            <br>

            <!-- Phone number -->
            {{Form::tel('phoneNumber','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Phone Number'])}}

            <br>

            {{Form::submit('Order',['class'=>'btn btn-primary'])}}

        {{ Form::close() }}

    </div>


@endsection
