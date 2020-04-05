
<form action="{{ route('items-form') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="itemName">Введите название продукта</label>
    <input type="text" name="itemName" placeholder="Название" id="itemName" class="form-control">
  </div>
  <div class="form-group">
    <label for="itemCategories">Выберите категории для продукта</label>
    <select multiple class="form-control" id="itemCategories" name="itemCategories[]">
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
  <div class="form-group">
    <label for="itemCost">Введите цену продукта</label>
    <input type="text" name="itemCost" placeholder="Цена" id="itemCost" class="form-control">
  </div>
  <div class="form-group">
    <label for="itemDesc">Введите описание продукта</label>
    <input type="text" name="itemDesc" placeholder="Описание" id="itemDesc" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Добавить</button>
</form>
