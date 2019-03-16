@extends('layouts.app')


@section('content')


<?php
$idPrijavljenog = Auth::id();
$stariMail = Auth::User()->email;
$stariPassword = Auth::User()->password;


?>

<div id="usredini">
<br>
<h1> Unesite nove podatke </h1>

{{ Form::open(array('url' => '/changePassword')) }}
<br> <br> <br>
{{Form::text('stariPassword','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Unesite stari password'])}}
<br>
{{Form::text('noviPassword','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Unesite novi password'])}}
<br>
{{Form::text('confirmPassword','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Potvrdite password'])}}
<br>
{{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}

{{ Form::close() }}

</div>

@endsection
