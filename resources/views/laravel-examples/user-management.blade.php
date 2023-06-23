@extends('layouts.user_type.auth')

@section('content')
@if(session('deleteSuccess'))

            <div class="alert alert-success mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('deleteSuccess')}}</span>
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
                            <h5 class="mb-0">Все пользователи</h5>
                        </div>
                        <a href="#popup" class="btn btn-sm mb-3 " style=" color:#fff;background-color: #188989;" type="button">+&nbsp; Добавить</a>
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
                                        Имя
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Коментарии
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                          @if ($user->avatar)
                                          <img src="{{ $user->avatar }}" class="avatar avatar-sm me-3">
                                          @else
                                          <img alt="File:Sample User Icon.png" class="avatar avatar-sm me-3" src="//upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" decoding="async">
                                          @endif
                                           
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="/user/edit/{{ $user->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <form action="/user/delete/{{ $user->id }}" method="POST" >
                                          @csrf @method('delete')
                                          <button class="delete" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i  class="cursor-pointer fas fa-trash text-secondary "></i>
                                          </button>
                                        </form>

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
<section id="popup" class="popup">
    <div class="popup__body">
        <div class="popup__contnet">
            <div class="popup__top">
                <a href="#" class="popup__clous">X</a>
            </div>
            <div class="popup_contacts">
                <div class="popup_contacts_info">
                    <div class="popup_call_us"> 
                    <form action="/user/create" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <input type="text" autocomplete="off" name="name" class="popup__input" placeholder="Введите Имя" id="name">
                    <input type="file" name="avatar"  class="popup__input" placeholder="добавьте фото" id="photo">
                    <input type="email" name="email" type="email" class="popup__input" placeholder="Введите эмайл" id="email">
                    <input type="text" name="phone" class="popup__input" placeholder="Введите Телефон" id="phone">
                    <input type="text" name="password" class="popup__input" placeholder="Введите Пароль" id="password">
                   </div>
                    <button type="submit" class="popup__btn">Отправить</button>
                </form>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
