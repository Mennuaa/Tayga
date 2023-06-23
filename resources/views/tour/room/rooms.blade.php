@extends('layouts.user_type.auth')

@section('content')

@if(session('createdSuccess'))

            <div class="alert alert-success mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('createdSuccess')}}</span>
                    </div>
                    <script>
                    let error = document.querySelector('.alert-success');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);

                </script>
        @endif
<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Все Номера</h5>
                        </div>
                        <a href="{{ route('room.add.view') }}" class="btn btn-sm mb-3 dobavit_all" type="button" style=" color:#fff;background-color: #188989;">+ Добавить</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Фото
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Название
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Оценка
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Инфо        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                          @if ($room->avatar)
                                          <img src="{{ $room->avatar }}" class="avatar avatar-sm me-3">
                                          @else
                                          <img alt="File:Sample tour Icon.png" class="avatar avatar-sm me-3" src="https://svgsilh.com/svg/40309.svg" decoding="async">
                                          @endif
                                           
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->rating }} / 5</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->subinfo }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="/room/{{ $room->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit tour">
                                            Посмотреть
                                        </a>
                                        

                                    </td>
                                </tr>
                               
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection