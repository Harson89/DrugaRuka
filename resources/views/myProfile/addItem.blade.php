@extends('layouts.app')

@section('content')

<?php

$selectedGenderID = 0;

?>


<!-- <img src="images/test2.png" alt="Mountain"> -->

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
    <!--FORM -->
    <form action="{{ URL::to('additemExecute') }}" method="post" enctype="multipart/form-data" >


    {{ csrf_field() }}

    <!-- product name -->
    {{Form::text('itemName','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Item Name'])}}

    <!-- description -->
    {{Form::textarea('description','', ['required'=>'required','class' => 'text-center form-control', 'placeholder'=>'Description', 'rows'=>'3', 'cols'=>'2'] )}}
<br>
        <!-- GENDER -->
        <select onchange="getGender()" class="form-control" name="gender" id="genderSelect" >
            <option selected disabled hidden value=0> Choose Gender </option>
            <option  value=1 > unisex </option>
            <option value=2 > male </option>
            <option value=3 > female </option>
            <option value=4 > kids </option>
    </select>
    <br>


    <!-- assign CATEGORIES for each GENDER -->

    <?php
        $unisexCategories = App\category::where('gender',1)->get();
        $maleCategories = App\category::where('gender',2)->get();
        $femaleCategories = App\category::where('gender',3)->get();
        $kidsCategories = App\category::where('gender',4)->get();

        foreach($unisexCategories as $unisexCategory){
            echo $unisexCategory->name;
            $test = $unisexCategory->name;
        }
    ?>


    <!-- get gender to display right categories -->
    <script type='text/javascript'>
        function getGender(){
            var model=$('#genderSelect').val();
           //alert(model);

            //dodavanje u formu
            /* var genderCategories = document.getElementById("categoriesFromGender");
            var option = document.createElement("option");
            option.text = "TEST";
            genderCategories.add(option); */

            // ----------------------------------------------------


            //ukloniti sve kategorije
            $('#categoriesFromGender').empty();




            //dodat kategorije za unisex
            if(model == 1){

                <?php
                    foreach($unisexCategories as $unisexCategory){
                ?>

                    var genderCategories = document.getElementById("categoriesFromGender");
                    var option = document.createElement("option");
                    option.value =" <?php echo $unisexCategory->id; ?> ";
                    option.text =" <?php echo $unisexCategory->name ?> ";
                    genderCategories.add(option);


                <?php
                    }
                ?>
              //MALE
            } else if(model == 2){

                <?php
                    foreach($maleCategories as $maleCategory){
                ?>

                    var genderCategories = document.getElementById("categoriesFromGender");
                    var option = document.createElement("option");
                    option.value =" <?php echo $maleCategory->id; ?> ";
                    option.text =" <?php echo $maleCategory->name ?> ";
                    genderCategories.add(option);


                <?php
                    }
                ?>
              //FEMALE
            } else if(model == 3){

                <?php
                    foreach($femaleCategories as $femaleCategory){
                ?>

                    var genderCategories = document.getElementById("categoriesFromGender");
                    var option = document.createElement("option");
                    option.value =" <?php echo $femaleCategory->id; ?> ";
                    option.text =" <?php echo $femaleCategory->name ?> ";
                    genderCategories.add(option);


                <?php
                    }
                ?>
              //KIDS
            } else if(model == 4){

                <?php
                    foreach($kidsCategories as $kidsCategory){
                ?>

                    var genderCategories = document.getElementById("categoriesFromGender");
                    var option = document.createElement("option");
                    option.value =" <?php echo $kidsCategory->id; ?> ";
                    option.text =" <?php echo $kidsCategory->name ?> ";
                    genderCategories.add(option);


                <?php
                    }
                ?>


            }




     }
     </script>

    <?php
        $categories = App\category::where('gender',$selectedGenderID)->get();
    ?>






    <!-- CATEGORY ID -->
    <select required="required" id="categoriesFromGender" class="form-control" name="category_id">

    </select>
    <br>



    <!-- price -->
    <span> Price </span>
    {!! Form::number('price', '0.0', ['required'=>'required','min' => '0.01', 'step'=>'any', 'class' => 'text-center form-control']) !!}
    <br>
    <br>


    <!-- XXXL -->
        <span> XXXL QUANTITY </span>
        {{ Form::input('number', 'quantityXXXL', '0', ['class' => 'form-control']) }}
        <br>

    <!-- XXL -->
    <span> XXL QUANTITY </span>
    {{ Form::input('number', 'quantityXXL', '0', ['class' => 'form-control']) }}
    <br>

    <!-- XL -->
    <span> XL QUANTITY </span>
    {{ Form::input('number', 'quantityXL', '0', ['class' => 'form-control']) }}
    <br>

    <!-- L -->
    <span> L QUANTITY </span>
    {{ Form::input('number', 'quantityL', '0', ['class' => 'form-control']) }}
    <br>

    <!-- M -->
    <span> M QUANTITY </span>
    {{ Form::input('number', 'quantityM', '0', ['class' => 'form-control']) }}
    <br>

    <!-- S -->
    <span> S QUANTITY </span>
    {{ Form::input('number', 'quantityS', '0', ['class' => 'form-control']) }}
    <br>

    <!-- XS -->
    <span> XS QUANTITY </span>
    {{ Form::input('number', 'quantityXS', '0', ['class' => 'form-control']) }}
    <br>


    <!-- picture upload -->
    <div class="form-control">
        <label for="author">Picture:</label>
        <input type="file" name="file" id="file" required="required">
    </div>
    <br>

    <!-- submit -->
    {{Form::submit('send',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>

@endsection
