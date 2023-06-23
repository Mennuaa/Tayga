@extends('components.head')
@section('sections')

<main>
    <div class="login">
        <a href="#" class="logo">
            <img src="img/layout/general/logo-black.svg" alt="">
        </a>

        <form method="POST" action="/auth/signin" class="login__inner">
            @csrf
            <div class="login__inline">
                <a href="/signin" class="login__link login__active">Авторизоваться</a>
            </div>

            <div class="group">
                <div class="group__input">
                    <input name="email" type="text" placeholder="Введите email">
                </div>
            </div>

            <div class="group">
                <div class="group__input">
                    <input name="password" type="text" placeholder="Введите пароль">
                </div>
                <div class="group__btn">
                    <img src="img/layout/general/eye.svg" alt="">
                </div>
            </div>

            <a href="#" class="login__forgot">Забыли пароль ?</a>

            <button type="submit" class="login__btn button button-black">Войти</button>
        </form>
    </div>
</main>
@endsection