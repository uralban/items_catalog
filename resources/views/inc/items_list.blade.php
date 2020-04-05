<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Название</th>
      <th scope="col">Категории</th>
      <th scope="col">Цена</th>
      <th scope="col">Описание</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  <tbody>
    @if(session('items'))
      @if(session('items') == [''])
      @else
        @foreach(session('items') as $item)
          <tr>
            <td>
              {{ $item->name }}
            </td>
            <td>
              {{ $item->cats }}
            </td>
            <td>
              {{ $item->cost }}
            </td>
            <td>
              {{ $item->description }}
            </td>
            <td>
              @guest
                Только после авторизации
              @else
                <a href="{{ route('showOneItem', $item->id) }}">
                  <button class="btn btn-warning">
                    {{ __('Редактировать') }}
                  </button>
                </a>
                <a href="{{ route('deleteItem', $item->id) }}">
                  <button class="btn btn-danger">
                    {{ __('Удалить') }}
                  </button>
                </a>
                @endguest
            </td>
          </tr>
        @endforeach
      @endif
    @else
      @foreach($items as $item)
        <tr>
          <td>
            {{ $item->name }}
          </td>
          <td>
            {{ $item->cats }}
          </td>
          <td>
            {{ $item->cost }}
          </td>
          <td>
            {{ $item->description }}
          </td>
          <td>
            @guest
              Только после авторизации
            @else
              <a href="{{ route('showOneItem', $item->id) }}">
                <button class="btn btn-warning">
                  {{ __('Редактировать') }}
                </button>
              </a>
              <a href="{{ route('deleteItem', $item->id) }}">
                <button class="btn btn-danger">
                  {{ __('Удалить') }}
                </button>
              </a>
              @endguest
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
