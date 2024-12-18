@extends('layout')
@section('title')Модерация @endsection
@section('main_content')
<x-h1_page_name>
  <x-slot name="page_name">
    Модерация:
    @if(request()->routeIs('moderation.moderation')){{{'Все публикации'}}}
    @elseif(request()->routeIs('moderation.unpublished')){{{'Неопубликованные публикации'}}}
    @elseif(request()->routeIs('moderation.published')){{{'Опубликованные публикации'}}}
    @elseif(request()->routeIs('moderation.archive')){{{'Архивные публикации'}}}

    @endif
  </x-slot>
</x-h1_page_name>
<form method="post" action={{ route('moderation.check') }}>
  @csrf
  <x-control_panel></x-control_panel>
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
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
        <th>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage()}}</th>
        <td>

          @if(isset($el->user->name))
          {{ $el->user->name}}
          @else
          <span>Не найден</span>
          @endif
        </td>
        <td><a href="/products/{{$el->id}}">{{$el->product_name}}</a></p>
        <td>{{$el->status}}</td>
        <td>{{$el->created_at}}</td>
        <td><input type="checkbox" name="options[]" value="{{$el->id}}"></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</form>
<div class="pagination d-flex justify-end">{{ $products->links('pagination::bootstrap-5') }}</div>

@endsection