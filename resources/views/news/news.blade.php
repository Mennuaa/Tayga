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
                            <h5 class="mb-2">Все Новости</h5>
                        </div>
                        <a href="{{ route('news.add') }}" class="btn btn-sm mb-3 dobavit_all" type="button" style=" color:#fff;background-color: #188989;">+ Добавить</a>
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
                                        Дата
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Инфо        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $new->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                          @if ($new->image)
                                          <img src="{{ $new->image }}" class="avatar avatar-sm me-3">
                                          @else
                                          <img alt="File:Sample tour Icon.png" class="avatar avatar-sm me-3" src="https://svgsilh.com/svg/40309.svg" decoding="async">
                                          @endif
                                           
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $new->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $new->date }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $new->text }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="/news/{{ $new->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit tour">
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