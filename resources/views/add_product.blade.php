<?php //dd($subcategories) 
?>
@extends('layout')
@if($errors->any())
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@section('title')Добавить продукт @endsection
@section('main_content')
<h1 class="mt-4 mb-4">Добавить продукт</h1>
<p class="mb-2 mt-3"><b>Для добавления продукта необходимо указать:</b></p>
<ol>
    <li>Тип продукта</li>
    <li>Название продукта</li>
    <li>Отзыв о продукте</li>
    <li>Цену за которую продукт продаётся в рублях</li>
</ol>
</p>
<form method="post" enctype="multipart/form-data" action="products/check">
    @csrf
    <div class="row">
        <div class="col">
            <div class="row" id="app">
                <categories-component :data="{{ json_encode(['subcategories' => $subcategories, 'categories' => $categories])}}" /></categories-component>
            </div>
            @vite('resources/js/app.js')
            <input type="text" class="form-control w-25 bg-white" name="product_name" id="product_name" placeholder="Название продукта">
            <br>
            <input type="text" class="form-control w-25 bg-white" name="product_description" id="product_description" placeholder="Описание продукта"><br>
            <p class="mb-2">Выберите магазин в котором приобретался продукт</p>
            <select class="form-select w-25 mb-4 bg-white" name="shop" id="shop_category">
                @foreach ($shops as $el)
                <option value="{{$el->shop_name}}">{{$el->shop_name}}</option>
                @endforeach
            </select>
            <p>Загрузить фотографию продукта</p>
            <input type="file" name="product_image" id="image" placeholder="Выбрать фото" class="mb-4">
            <input type="text" class="form-control bg-white  w-25 mb-4" name="product_price" id="product_price" placeholder="Цена продукта в рублях">
            <p>Оцените качество продукта</p>
            <select name="product_quality" id="product_quality" class="mb-3">
                @foreach ($qualities as $el)
                <option value="{{$el->quality_name}}">{{$el->quality_name}}</option>
                @endforeach
            </select>
            <textarea name="message" id="message" class="form-control w-50 bg-white" style="height:150px; resize:none;" placeholder="Напишите ваш отзыв"></textarea>
            <br>

        </div>
    </div>

    <button type="submit" class="btn btn-success">Добавить продукт</button>
</form>
@endsection