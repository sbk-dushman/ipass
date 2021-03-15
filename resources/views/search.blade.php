@extends('master')
@section('content')
    <ul>
        <li class="content-list__item tab-content1">
                <div class="search">
                    <div class="main-content">
                            <h2 class="man-title">Поиск</h2>

                            <form action="" method="POST">
                            @csrf
                                <input required class="search-input" name="search_req" type="text">
                                <button сlass="search-btn main-btn" type="submit"> Найти </button>
                                
                            </form>

                            <div class="serch-output">
                            
                            </div>

                            
                    </div>
                </div>
                
        </li>
        @if( $results == null )
            
        @else
            @foreach( $results as $data )
                <li class="content-list__item">
                    <div>
                        {{$data->name}}
                        {{$data->surname}}
                        {{$data->lastname}}  
                        <a href="{{route('group-URL')}}{{$data->group}}">
                            {{$data->group_rus}}
                        </a>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    
    <style>

        ul {
            display: flex;
            flex-direction: column;
        }

    </style>
    
@endsection