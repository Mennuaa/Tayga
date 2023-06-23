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
                            <h5 class="mb-0">Все туры</h5>
                        </div>
                        <a href="{{ route('tour.add.view') }}" class="btn btn-sm mb-3 dobavit_all" style=" color:#fff;background-color: #188989;" type="button">+&nbsp; Добавить</a>
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
                                        Цена
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Дата        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tours as $tour)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tour->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                          @if ($avatar->where('tour_id', $tour->id)->first())
                                          <img src="{{ $avatar->where('tour_id', $tour->id)->first()->image}}" class="avatar avatar-sm me-3">
                                          @else
                                          <img alt="File:Sample tour Icon.png" class="avatar avatar-sm me-3" src="http://upload.wikimedia.org/wikipedia/commons/9/99/Sample_tour_Icon.png" decoding="async">
                                          @endif
                                           
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tour->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tour->price }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tour->date }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="/tour/edit/{{ $tour->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit tour">
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