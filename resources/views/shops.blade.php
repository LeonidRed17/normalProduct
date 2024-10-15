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
<h1 class="mt-5 mb-4">Магазины </h1>
<p class="mb-3">Здесь можно выбрать магазин и посмотреть какие продукты в нём можно найти.</p>
<a href="/products" class="btn btn-primary mb-5">Все продукты</a>
<a href="/add_product" class="btn btn-primary mb-5">Добавить продукт</a>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($shops as $el)
    <div class="col">
        <div class="card-body text-center border border-lighter border-1 mt-2 p-2">
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto mt-3" style="max-width:384px;">{{$el->shop_name}}</p>
            <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto" style="max-width:384px;">{{$el->product_description}}</p>
        </div>
    </div>
    @endforeach
</div>
<br>
@endsection