@extends('layouts.app')


@section('content')


<?php
$mailUsera = Auth::User()->email;
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
<h1> Podrška korisnicima </h1>



{{ Form::open(array('url' => '/posalji')) }}
<br> <br> <br>
   <!-- Poruka -->
   {{Form::textarea('sadrzajPoruke','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Ovdje upišite poruku...Odgovor će vam biti poslan u što kraćem vremenskom roku na vašu email adresu.', 'rows'=>'3', 'cols'=>'2'] )}}
   <br>

   <input name="mailUsera" value="{{$mailUsera}}" type="hidden">

{{Form::submit('Pošalji',['class'=>'btn btn-primary'])}}

{{ Form::close() }}

</div>

@endsection
