@extends('layouts.user_type.auth')

@section('content')
<style>


.inputs {
  position: relative;
  margin: 0 20px;
}
.inputs_up{
    width: 100%;
    height: 100px;
    display: flex;  
    justify-content: space-between;
    align-items: center;
}
.inputs_up button{
    background: none;
    border: none;
    transition: 0.5s all ease-in-out;
    color: red;
}
.inputs_up a{
    width: 220px;
    height: 50px;
    border-radius: 20px;
    transition: 0.5s all ease-in-out;
    border: 1px solid red;
    display: flex;
    justify-content: center;
    align-items: center;
    align-self: start;
}
.inputs_up a:hover{
    background: red;
    border-color: red;
    color: #fff;
    text-decoration: none;
}
.inputs_up a:hover .inputs_up_button{
    color: #fff;
}
.inputs_up img{
    width: 100px;
    height: 100px;
    border-radius: 50px;margin-bottom: 10px;
}
.input {
  border: 1px solid #000;
  border-radius: 20px;
  color: #000;
  display: block;
  font-size: 16px;
  margin-bottom: 30px;
  padding: 8px 0 8px 20px;
  width: 50%;
}
</style>
<a href="{{ route('user-management') }}">
    <img alt="File:Ic arrow back 36px.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/36px-Ic_arrow_back_36px.svg.png?20141023105457" decoding="async" width="36" height="36" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/54px-Ic_arrow_back_36px.svg.png?20141023105457 1.5x, https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/72px-Ic_arrow_back_36px.svg.png?20141023105457 2x" data-file-width="36" data-file-height="36">
</a>
@if(session('updateSuccess'))

            <div class="alert alert-success mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('updateSuccess')}}</span>
                    </div>
                    <script>
                    let error = document.querySelector('.alert-success');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);

                </script>
        @endif
        <div class="inputs">
           <form class="inputs_up" action="/user/delete/{{ $user->id }}" method="POST" >
            @csrf
            @method('delete')
            @if ($user->avatar)
            <img src="{{ $user->avatar }}" class="">
            @else
            <img alt="File:Sample User Icon.png" class="" src="//upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" decoding="async">
            @endif
            <a href=""><button class="inputs_up_button" >Удалить пользователя</button></a>
           </form>
           <br />
            <form action="/user/update/{{ $user->id }}" class="update_inputs">
                <label for="">Имя</label>
          <input
            class="input"
            value="{{ $user->name }}"
            name="name" >
            <label for="">Email</label>
            <input
              class="input" value="{{ $user->email }}" type="email" disabled>
              <button class="mt-2 btn btn-success"> Сохранить</button>
            </form>
        </div>
      </div>
  
@endsection
