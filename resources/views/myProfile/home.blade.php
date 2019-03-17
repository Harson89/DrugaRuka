@extends('layouts.app')

@section('content')

<!--Add new item button-->
<button onclick='location.href="/addItem"' class="btn btn-primary"> Add Item </button>

<!--Edit password-->
<button onclick='location.href="/changePasswordPage"' class="btn btn-primary">Promjeni password </button>

<!--Edit email-->
<button onclick='location.href="/changeEmailPage"' class="btn btn-primary">Promjeni email</button>

@endsection

