@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
          <h3>Редактор категорий</h3>
        </div>
      </div>
    </div>

    <br>
    <div class="container">
      @guest
      @else
      <div class="row">
        <div class="col-lg-8">
          @include('inc.messages')
          <form action="{{ route('categories-form') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="catName">Введите название категории</label>
              <input type="text" name="catName" placeholder="Название категории" id="catName" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Добавить</button>
          </form>
        </div>
      </div>
      @endguest
    </div>
    @include('inc.categories_list')
@endsection
