@extends('Nhome')
@section('tabel-group')
  <div class="table">
      <h2 class="main-title">Список групп</h2>
    <table class="main-content select-list">

                            <tr>
                                <th>Статус</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>
                                <th>Группа</th>
                                <th>Дествия</th>
                            </tr>
                            <tbody>
                                 @foreach($students as $student)

			<tr class="select-list__item">
                <form class="add-to-selected-list"
                    action=""
                    method="POST"
                >
                @csrf
                    <td>

                    </td>

                    <td>
                        {{ $student->surname }}
                    </td>
                    <td>
                        {{ $student->name }}
                    </td>
                    <td>
                        {{ $student->lastname }}
                    </td>
                    <td>

                    </td>
                    <td>
                         <button
                                    id="btn_add"
                                    type="submit"
                                    name="add_to_cart"
                                    value="{{ $student->id }}"
                                    {{-- class="main-btn" --}}
                                >  <svg height="12" viewBox="0 0 426.66667 426.66667" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"/></svg>

                                </button>
                    </td>
                </form>
			</tr>

		@endforeach

                                 {{-- @foreach ($results as $item)
                                    <tr style="height: 50px;" class="select-list__item ">
                                        <td>{{$item->lastname}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->surname}}</td>

                                        <td>
                                            <a href="{{ route('group-URL') }}{{ $item->group }}">{{$item->group_rus}}</a>
                                        </td>
                                        <td>
                                            <button data_addId="{{$item->id}}" id="btn_add_from_search" class="main-btn">
                                                Добавить
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach --}}
                        </tbody>
                    </table>
   </div>
  <div class="groups-name">
    <h2 class="man-title">Состав группы </h2>
  </div>
  <div class="pag-table">
  </div>
@endsection
