@extends('master')
@section('content')
<nav class="main-sidebar">
      <div class="title">
            <h1>УКСИВТ</h1>
      </div>
      <ul class="tab-list">
            <li class="tab-list__item tab tab-btn  is-active">

                  Группы
            </li>
            <li class="tab-list__item">
                  Поиск
            </li>
            <li class="tab-list__item">
                  <a class="tab-title" href="{{route('selected-URL')}}">Выбранное</a>
            </li>
            <li class="tab-list__item">
                  <a class="tab-title" href="{{route('file.upload')}}">Загрузить файлы</a>
            </li>
            <li class="tab-list__item">
                  <a class="tab-title" href="">Синхронизация</a>
      </li>
      </ul>
      <ul class="content-list">
            <li class="content-list__item tab-content is-active">

                  <div class="title-group">
                        <h3>Список групп</h3>
                  </div>
                  <hr class="hr">
                        <div class="group-container">
                        @foreach( $groups as $group )
                              <div class="group-card">
                                    <a
                                          class="group-title"
                                          href="{{route('group-URL')}}{{$group->codegroup}}"
                                    >
                                          {{$group->group}}
                                    </a>
                              </div>
                        @endforeach
                  </div>
                  @if ($groups->total() > $groups->count())
                   <ul class="pagination">
                    <li class="pagination__item">
                        {{$groups->links()}}
                    </li>
                </ul>

                  @endif

            </li>


        <li class="content-list__item tab-content">
            <div class="search">
                <div class="main-content">
                    <h2 class="man-title">Поиск</h2>
                    <form action="/api.php">
                       <input class="search-input" name="search-req" type="text">
                    <button сlass="search-btn main-btn" type="submit"> Найти </button>
                        @csrf
                </form>
                    <div class="serch-output">
                    </div>
                </div>
            </div>
        </li>
        <li class="content-list__item"></li>
    </ul>
</nav>

@endsection
