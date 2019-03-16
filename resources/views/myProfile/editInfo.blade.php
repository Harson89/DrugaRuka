@extends('layouts.app')


@section('content')


<?php
$idPrijavljenog = Auth::id();
$stariMail = Auth::User()->email;
$stariPassword = Auth::User()->password;


echo $stariMail;
echo $stariPassword;
?>



@endsection
