@extends('layouts.app')

@section('content')
<div id="usredini">

<br><br><br><br><br>
<!--Edit password-->
<button onclick='location.href="/changePasswordPage"' class="btn btn-secondary btn-lg btn-block">Promjeni password </button>
<br>

<!--Edit email-->
<button onclick='location.href="/changeEmailPage"' class="btn btn-secondary btn-lg btn-block">Promjeni email</button>
<br>

<!--Support-->
<button onclick='location.href="/sendMessage"' class="btn btn-secondary btn-lg btn-block">Pošalji poruku </button>
<br>

<?php

$tipUsera = Auth::user()->role;
?>

@if($tipUsera == 1)

<!--Manage products-->
 <button onclick='location.href="/ownerPage"' class="btn btn-secondary btn-lg btn-block">Manage products </button>
 <br>

<!--Add new item button-->
<button onclick='location.href="/addItem"' class="btn btn-secondary btn-lg btn-block"> Add Item </button>
<br>
</div>

@endif

@endsection

