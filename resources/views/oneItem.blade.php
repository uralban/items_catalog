@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
          <h3>Изменить товар</h3>
        </div>
      </div>
    </div>

    <br>
    <div class="container">
      @include('inc.messages')
      <div class="row">
        <div class="col-lg-8">
          <form action="{{ route('editItem', $item->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="itemName">Введите название продукта</label>
              <input type="text" name="itemName" value="{{ $item->name }}" id="itemName" class="form-control">
            </div>
            <div class="form-group">
              <label for="itemCategories">Выберите категории для продукта</label>
              <select multiple class="form-control" id="itemCategories" name="itemCategories[]">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="itemCost">Введите цену продукта</label>
              <input type="text" name="itemCost" value="{{ $item->cost }}" id="itemCost" class="form-control">
            </div>
            <div class="form-group">
              <label for="itemDesc">Введите описание продукта</label>
              <input type="text" name="itemDesc" value="{{ $item->description }}" id="itemDesc" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Изменить</button>
          </form>
          <a href="{{ route('index') }}">
            <button class="btn btn-danger myMarginTop">
              {{ __('Отмена') }}
            </button>
          </a>
        </div>
      </div>
    </div>
@endsection
