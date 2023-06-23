@extends('layouts.user_type.auth')

@section('content')
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


@if(session('imageADD'))

            <div class="alert alert-success mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('imageADD')}}</span>
                    </div>
                    <script>
                    let error = document.querySelector('.alert-success');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);

                </script>
@endif

@if(session('imageDelete'))

            <div class="alert alert-success mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('imageDelete')}}</span>
                    </div>
                    <script>
                    let error = document.querySelector('.alert-success');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);

                </script>
@endif
<div class="name_back mb-2">
    <a href="{{ route('tour.all') }}">
        <img alt="File:Ic arrow back 36px.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/36px-Ic_arrow_back_36px.svg.png?20141023105457" decoding="async" width="36" height="36" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/54px-Ic_arrow_back_36px.svg.png?20141023105457 1.5x, https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/72px-Ic_arrow_back_36px.svg.png?20141023105457 2x" data-file-width="36" data-file-height="36">
    </a>

    <h2>Изменить тур</h2>
</div>
       <div class="tour_photos">
        <div class="tour_photos_title">
            <h3>Фото Тура</h3>
        </div>
        <div class="images">
        @foreach ($images as $image)
            
                <form method="POST" action="/tour_image/delete/{{ $image->id }}" class="image" >
                    @csrf
                    @method('delete')
                    <img src="{{ $image->image }}" alt="">
                    <div class="image_hover">
                    <a ><button type="submit" class="image_hover_button">-</button></a>
                </div>
            </form>
        @endforeach
        
            </div>
        </div>

        <div class="add_photo">
            <h4>Добавить фото</h4>
        </div>
        <form action="/tour_image/add" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <input type="hidden" name="tour_id" value='{{ $tour->id }}'>

            <div class="input-group realprocode control-group lst increment" >
                <div class="input-group-btn"> 
                  <button class="btn dobavit_photo btn-success" type="button"> <i class="fldemo glyphicon glyphicon-plus"></i>Добавить еще фото</button>
                </div>
              </div>
              <div class="clone hide">
                <div class="realprocode control-group lst d-flex" style="margin-top:10px">
                  <input type="file" name="avatars[]" style="width:300px"  class="myfrm form-control mr-2">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Удалить</button>
                  </div>
                </div>
              </div>
              <button class="btn btn-success" type="submit"> <i class="fldemo glyphicon glyphicon-plus"></i>Добавить</button>

        </form>
        <div class="tour_info">
            <div class="tour_info_inputs">
                <form action="{{ route('tour.add') }}"  method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('post')
                         <div class="update_inputs">
                             <div class="first_divs">
                                 <div class="name">
                                     <label for="">Название </label>
                             <input class="form-control input" type="text" value="{{ $tour->name }}" name="name" aria-label="default input example">
                                 </div>
             
                     <div class="date">
                         <label for="">Дата</label>
                         <input class="form-control input" name="text" type="date" value="{{ $tour->date }}"  aria-label="default input example">
                     </div>
                             </div>
                     </div>
                         <div class="second_div">
                
             
                         <div class="form-floating">
                             <textarea class=" input form-control" placeholder="Leave a comment here" name="text" id="floatingTextarea">{{ $tour->text }}</textarea>
                         <label for="floatingTextarea">Текст</label>
                       </div>
                       <div class="form-floating">
                        <textarea class=" input form-control"  placeholder="Leave a comment here" name="tour_privilages" id="floatingTextarea">{{ $tour->tour_privilages}}</textarea>
                    <label for="floatingTextarea">Привилегии</label>
                  </div>
                    </div>
        
                     <div class="third_div">
                        <div class="price">
                            <label for="">Цена</label>
                              <input class="form-control input" type="text" value="{{ $tour->price }}" name="price"  aria-label="default input example">
                         </div>
                         <div class="form-floating">
                            <textarea class=" input form-control" style="width: 100%;"  placeholder="comment" name="tour_advantages" id="floatingTextarea">{{ $tour->tour_advantages }}</textarea>
                        <label for="floatingTextarea">Что входит в стоимость тура</label>
                      </div>
                     </div>
                     <div class="subtitle">
                        <label for="">Под заголовок</label>
                <input class="form-control input" type="text" value="{{ $tour->subtitle }}" name="subtitle"  aria-label="default input example">
        
            </div>
        </div>


















        <script type="text/javascript">
            $(document).ready(function() {
               
              $(".dobavit_photo").click(function(){ 
                  var lsthmtl = $(".clone").html();
                  $(".increment").after(lsthmtl);
              });
              $("body").on("click",".btn-danger",function(){ 
                  $(this).parents(".realprocode").remove();
              });
    
            });
        </script>
@endsection
