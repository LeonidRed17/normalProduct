@extends('layout')
@section('title')Модерация @endsection

@section('main_content')
<x-h1_page_name>
  <x-slot name="page_name">Модерация</x-slot>
</x-h1_page_name>
<x-control_panel></x-control_panel>
<table class="table">
  <thead>
    <tr>
      <td>№</td>
      <td>Автор</td>
      <td>Название</td>
      <td>Статус</td>
      <td>Дата</td>
      <td>Выбрать</td>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $el)
    <tr>
      <th>{{$loop->iteration}}</th>
      <td>
        @if(isset($el->author))
        {{$users[$el->author]->name}}
        @else
        <span>Не найден</span>
        @endif
      </td>
      <td><a href="/products/{{$el->id}}">{{$el->product_name}}</a></p>
      <td>Одобрен</td>
      <td>{{$el->created_at}}</td>
      <td><input type="checkbox" name="{{$el->id}}"></td>
    </tr>
    @endforeach

  </tbody>
</table>

<!--<x-table>
    <x-slot name="first_col_name">№</x-slot>
    <x-slot name="second_col_name">Автор</x-slot>
    <x-slot name="third_col_name">Название</x-slot>
    <x-slot name="fourth_col_name">Статус</x-slot>
    <x-slot name="five_col_name">Дата</x-slot>
    <x-slot name="six_col_name">Выбрать</x-slot>
    @foreach($products as $el)
    <x-slot name="publictaion_number">1</x-slot>
    <x-slot name="user_name">Вася</x-slot>
    <x-slot name="product_name"><a href="/products/{{$el->id}}">{{$el->product_name}}</a></x-slot>
    <x-slot name="product_status">Одобрен</x-slot>
    <x-slot name="product_date">{{$el->created_at}}</x-slot>
    <input type="checkbox" class="" name="{{$el->id}}">
    @endforeach
</x-table>
-->
@endsection