<?php // dd($products) 
?>
@extends('layouts.layout')
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
<h1 class="mt-5 mb-4">Карточка продукта</h1>
<p class="mb-3">Здесь вы можете посмотреть больше информации о продукте и прочитать отзыв от автора что загрузил продукт.
</p>
<a href="/products" class="btn btn-primary mb-5">Назад к продуктам</a>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
    @foreach($product as $el)
    <div class="col col-xl-4">
        @if($el->product_image)
        <img src="{{ asset('/images/products/' . $el->product_image) }}" width="100%" height="500" class="border border-lighter border-1">
        @else
        <div class="text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="500" fill="currentColor" class=" bi-image border border-lighter border-1" viewBox="0 0 16 16">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
            </svg>
        </div>
        @endif
        <div class="card-body text-center border border-lighter border-1 mt-2 p-2">
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto mt-3" style="max-width:384px;">{{$el->product_name}}</p>
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto" style="max-width:384px;">{{$el->product_description}}</p>
            <p class="card-text text-end fw-bold">{{$el->product_price}} руб.</p>
            <p class="card-text text-start text-danger">Качество: {{$el->product_quality}}</p>

            <div class="d-flex justify-content-between">
                <a href="#" class="">{{$el->product_category}}</a>
                <a href="#" class="">{{$el->product_subcategory}}</a>
                <a href="#" class="">{{$el->shop}}</a>
                <small class="text-body-secondary">{{$el->created_at}}</small>
            </div>
        </div>
    </div>
    <div class="col col-xl-4 mt-5 mt-md-0">
        <h2 class="text-center">Отзыв</h2>
        <br>
        <p class="review__text ms-3">{{$el->product_message}}</p>
    </div>

    @endforeach
</div>

<br>
@endsection