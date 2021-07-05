@extends('layouts.app')


@section('content')


<?php
$idPrijavljenog = Auth::id();
$stariMail = Auth::User()->email;
$stariPassword = Auth::User()->password;


?>



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

<div id="usredini">
<br>
<h1> Promjeni email </h1>



{{ Form::open(array('url' => '/changeEmail')) }}
<br> <br> <br>
{{Form::text('noviMail','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>$stariMail])}}
<br>
{{Form::text('confirmMail','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Potvrdi mail'])}}
<br>
{{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}

{{ Form::close() }}

</div>

@endsection
