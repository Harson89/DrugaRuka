@extends('layouts.app')

@section('content')


<!--Edit password-->
<button onclick='location.href="/changePasswordPage"' class="btn btn-primary">Promjeni password </button>

<!--Edit email-->
<button onclick='location.href="/changeEmailPage"' class="btn btn-primary">Promjeni email</button>


<?php

$tipUsera = Auth::user()->role;
?>

@if($tipUsera == 1)

<!--Manage products-->
 <button onclick='location.href="/ownerPage"' class="btn btn-primary">Manage products </button>

<!--Add new item button-->
<button onclick='location.href="/addItem"' class="btn btn-primary"> Add Item </button>

<!--Add new item button-->
<button onclick='location.href="/shipItems"' class="btn btn-primary"> Items to ship </button>

@endif

@endsection

