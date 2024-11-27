<?php // dd($products) 
?>
@extends('layout')
@section('title')Все продукты@endsection

@section('main_content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<x-h1_page_name>
    <x-slot name="page_name">Все продукты</x-slot>
</x-h1_page_name>
<p class="mb-3">Здесь можно посмотреть все добавленные продукты.
    <br>Если вы попробовали продукт и хотите добавить его в базу нажмите "Добавить продукт":
</p>
<a href="/products" class="btn btn-primary mb-5">Все продукты</a>
<a href="/add_product" class="btn btn-primary mb-5">Добавить продукт</a>
<h2 class="text-center">Сортировка по магазинам</h2>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5">
    @foreach($shops as $el)
    <div class="col">
        <div class="card-body text-center border border-lighter border-1 mt-2 p-2">
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto mt-3" style="max-width:384px;">{{$el->shop_name}}</p>
        </div>
    </div>
    @endforeach
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($products as $el)
    <div class="col mb-5">
        <a href="/products/{{$el->id}}">
            @if($el->product_image)
            <img src="{{ asset('/images/products/' . $el->product_image) }}" width="100%" height="500" class="border border-lighter border-1">
            @else
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="500" fill="currentColor" class="text-light bi bi-image border border-lighter border-1" viewBox="0 0 16 16">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
            </svg>
            @endif
        </a>
        <!-- <a href="/products/{{$el->id}}"><img src="{{ asset('/images/products/' . $el->product_image)}}" width="100%" height="350" class="border border-lighter border-1"></a>-->
        <div class="card-body text-center border border-lighter border-1 mt-2 p-2">
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto mt-3" style="max-width:384px;">{{$el->product_name}}</p>
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto" style="max-width:384px;">{{$el->product_description}}</p>
            <p class="card-text text-end fw-bold">{{$el->product_price}} руб.</p>
            <p class="card-text text-start text-danger">Качество: {{$el->product_quality}}</p>

            <div class="d-flex justify-content-between align-items-center">

                <a href="#" class="">{{$el->product_category}}</a>
                <a href="#" class="">{{$el->product_subcategory}}</a>
                <a href="#" class="">{{$el->shop}}</a>
                <small class="text-body-secondary">{{$el->created_at}}</small>
            </div>
        </div>
    </div>
    @endforeach

</div>

<br>
@endsection