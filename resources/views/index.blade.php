@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h1>Каталог товаров</h1>
        </div>
        <div class="col-lg-8">
          @include('inc.messages')
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          @include('inc.sortForm')
          @include('inc.items_list')
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
          @guest
          @else
          @include('inc.newItemForm')
        </div>
        @endguest
      </div>
    </div>
@endsection
