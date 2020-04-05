<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Название</th>
            <th scope="col">Управление</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $cat)
            <tr>
              <td>
                {{ $cat->name }}
              </td>
              <td>
                @guest
                  Только после авторизации
                @else
                  <a href="{{ route('showOneCategory', $cat->id) }}">
                    <button class="btn btn-warning">
                      {{ __('Редактировать') }}
                    </button>
                  </a>
                  <a href="{{ route('deleteCategory', $cat->id) }}">
                    <button class="btn btn-danger">
                      {{ __('Удалить') }}
                    </button>
                  </a>
                  @endguest
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
