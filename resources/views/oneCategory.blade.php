@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
          <h3>Изменить категорию</h3>
        </div>
      </div>
    </div>

    <br>
    <div class="container">
      @include('inc.messages')
      <div class="row">
        <div class="col-lg-8">
          <form action="{{ route('editCategory', $data->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Введите название категории</label>
              <input type="text" name="catName" value="{{ $data->name }}" id="catName" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Изменить</button>
          </form>
          <a href="{{ route('categories') }}">
            <button class="btn btn-danger myMarginTop">
              {{ __('Отмена') }}
            </button>
          </a>
        </div>
      </div>
    </div>
@endsection
