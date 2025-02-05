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
    <x-slot name="page_name">Продукты</x-slot>
</x-h1_page_name>

<div id="app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <productscomponent :data="{{ json_encode(['subcategories' => $subcategories, 'categories' => $categories])}}"></productscomponent>

    @endsection