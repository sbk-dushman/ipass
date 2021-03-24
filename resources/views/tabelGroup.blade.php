@extends('Nhome')
@section('tabel-group')
  <div class="table">
    {{-- @foreach ($students as $student)
        {{$student->name}}
    @endforeach --}}
    @foreach($students as $student)
			<tr class="select-list__item">
                <form
                    class="add-to-selected-list"
                    action=""
                    method="POST"
                >
                @csrf
                    <td>
                    
                    </td>
                    <td>
                        <div class="quantity">
                                <button
                                    id="btn_add"
                                    type="submit"
                                    name="add_to_cart"
                                    value="{{ $student->id }}"
                                    class="main-btn"
                                >
                                    Добавить
                                </button>
                        </div>
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

                </form>
			</tr>
             
		@endforeach
  </div>
  <div class="groups-name">

  </div>
  <div class="pag-table"></div>
@endsection