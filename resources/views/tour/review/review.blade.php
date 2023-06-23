@extends('layouts.user_type.auth')

@section('content')
@if(session('DeleteSuccess'))

            <div class="alert alert-danger mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('DeleteSuccess')}}</span>
                    </div>
                    <script>
                    let error = document.querySelector('.alert-danger');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);

                </script>
@endif
<div class="name_back mb-2" style="width: 500px;">
    <a href="javascript:history.back()">
        <img alt="File:Ic arrow back 36px.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/36px-Ic_arrow_back_36px.svg.png?20141023105457" decoding="async" width="36" height="36" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/54px-Ic_arrow_back_36px.svg.png?20141023105457 1.5x, https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/72px-Ic_arrow_back_36px.svg.png?20141023105457 2x" data-file-width="36" data-file-height="36">
    </a>

    <h2 class="ml-10 text-center" >Посмотреть комментарий</h2>
</div>
@if($review)


<div class="comment_up">
  <div class="comment_up_content">
      <a href="/user/edit/{{ $user->id }}" class="review_user">
          <img src="{{ $user->avatar }}" alt="">
          <h2>{{ $user->name }}</h2>
      </a>
  </div>
</div>
 <div class="tour_photos">
  <div class="tour_photos_title">
      <h3>Фото комментария</h3>
  </div>
  <div class="images">
      @if ($review_images !== null)
          @foreach ($review_images as $image)
          <img class="mr-5 mb-5" src="{{ $image->image }}" style="width:200px;height:200px;border-radius:20px;" alt="">
          @endforeach
      @else
     <h5> У комментария нету фото</h5>
     <style>.images{
      flex-direction: column;
     }</style>
          <img style="width:200px;height:200px;border-radius:20px;" src="https://static.vecteezy.com/system/resources/previews/002/089/746/non_2x/creative-minimalist-hand-painted-abstract-arts-background-nature-mountain-landscape-painting-with-japanese-wave-pattern-vector.jpg" alt="">
      @endif
      <table class="table mt-7">
          <thead>
            <tr>
              <th scope="col">Имя</th>
              <th scope="col">Оценка</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Общие звезды</th>
              <td>{{ $review->stars }} / 5</td>
            </tr>
            <tr>
              <th scope="row">Размещение</th>
              <td>{{ $review->placement_stars ? $review->placement_stars :" не оценен" }} / 5</td>
            </tr>
            <tr>
              <th scope="row">Сервис</th>
              <td>{{ $review->service_stars ? $review->service_stars :" не оценен" }} / 5 </td>
            </tr>
            <tr>
              <th scope="row">Питание</th>
              <td>{{ $review->eat_stars ? $review->eat_stars :" не оценен"  }} / 5</td>
            </tr>
          </tbody>
        </table>
   </div>
  
      </div>
  </div>
  <div class="comment_com">
      <h2 class="text-center text-primary">Коммент</h2>
      <p>{{ $review->revew }}</p>
  </div>

  <form action="/review/delete/{{ $review->id }}" method="POST" class="">

      @csrf
      @method('delete')
      <button class="btn-danger btn" onclick="reviewDelete({{ $review->id }})">Удалить</button>
      </form>
    @endif
@endsection
