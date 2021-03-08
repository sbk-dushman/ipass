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
            <a class="tab-title" href="{{route('drop-file')}}">Загрузить файлы</a>
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
                <div class="group-card">
                    <a class="group-title" href="{{route('group-URL')}}">1</a>
                </div>
                <div class="group-card">
                    <a class="group-title" href="#">2</a>
                </div>
                <div class="group-card">
                    <a class="group-title" href="#">3</a>
                </div>
                <div class="group-card">
                    <a class="group-title" href="#">21ee2e2e2e2e2e2</a>
                </div>
                <div class="group-card">
                    <a class="group-title" href="#">5</a>
                </div>
                <div class="group-card">
                    <a class="group-title" href="#">6</a>
                </div>
                </div>

                <ul class="pagination">
                    <li class="pagination__item">
                        <a href="#">1</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">След...
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" width="284.935px" height="284.936px" viewBox="0 0 284.935 284.936"
                            style="enable-background:new 0 0 284.935 284.936;" xml:space="preserve">
                            <g>
                                <path
                                    d="M222.701,135.9L89.652,2.857C87.748,0.955,85.557,0,83.084,0c-2.474,0-4.664,0.955-6.567,2.857L62.244,17.133
                                c-1.906,1.903-2.855,4.089-2.855,6.567c0,2.478,0.949,4.664,2.855,6.567l112.204,112.204L62.244,254.677
                                c-1.906,1.903-2.855,4.093-2.855,6.564c0,2.477,0.949,4.667,2.855,6.57l14.274,14.271c1.903,1.905,4.093,2.854,6.567,2.854
                                c2.473,0,4.663-0.951,6.567-2.854l133.042-133.044c1.902-1.902,2.854-4.093,2.854-6.567S224.603,137.807,222.701,135.9z" />
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </svg>
                    </a>
                    </li>
                </ul>

            </li>


        <li class="content-list__item tab-content">
            <div class="search">
                <div class="main-content">
                    <h2 class="man-title">Поиск</h2>
                    <form action="/api.php">
                       <input class="search-input" name="search-req" type="text">
                    <button сlass="search-btn" type="submit"> Найти </button>
                        @csrf
                </form>
                    <div class="serch-output">
                        <?php
                          $search_REQ;
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="content-list__item"></li>
    </ul>
</nav>
