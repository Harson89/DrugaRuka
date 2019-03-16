@extends('layouts.app')

@section('content')

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
{!! Form::open(['url' => '/additemExecute']) !!}
{{Form::text('itemName','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Item Name'])}}
{{Form::textarea('description','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Description', 'rows'=>'3', 'cols'=>'2'] )}}

{!! Form::number('price', '0.0', ['required'=>'required','min' => '0.01', 'step'=>'any', 'class' => 'text-center form-control','id'=> 'inputPrice']) !!}
<br>

{{Form::submit('send',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>

@endsection
