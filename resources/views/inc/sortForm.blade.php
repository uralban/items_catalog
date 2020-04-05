<form action="{{ route('sort-form') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="sortName">Выбрать категорию</label>
    <select class="form-control" name="sortName">
      <option value="all">ВСЕ</option>
      @if(session('categories'))
        @foreach(session('categories') as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      @else
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      @endif
    </select>
  </div>
  <button type="submit" class="btn btn-success">Выбрать</button>
</form>
