@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">

            <div class="col-lg-3">
                <div class="list-group">
                        @yield('categories')
                </div>
            </div>

            @yield('items')
        </div>
    </div>

@endsection
