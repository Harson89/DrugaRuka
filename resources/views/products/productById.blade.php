@extends('layouts.app')

@section('content')


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

<br>

<span> Description: </span>
<br>
{{$product->description}}


</div>

@endsection
