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
<div class="name_back mb-2">
    <a href="javascript:history.back()">
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
        <form action="/tour/edit/{{ $tour->id }}" method="POST" class="tour_info">
            @csrf
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
                              <input class="form-control input" type="number" value="{{ $tour->price }}" name="price"  aria-label="default input example">
                         </div>
                         <div class="form-floating">
                            <textarea class=" input form-control" style="width: 100%;"  placeholder="comment" name="tour_advantages" id="floatingTextarea">{{ $tour->tour_advantages }}</textarea>
                        <label for="floatingTextarea">Что входит в стоимость тура</label>
                      </div>
                     </div>
                     <div class="star_days">
                        <div class="stars">
                            <div class="stars_all">
                                <label for="">Общее</label>
                                <input value="{{ $tour->stars }}" class="form-control input" type="number" step="any" placeholder="Звезды" name="stars" id="">
                            
                            </div>
                            <div class="placement_stars">
                                <label for="">Размещение</label>
                            <input value="{{ $tour->placement_stars }}" class="form-control input" type="number" step="any" placeholder="Размещение" name="placement_stars" id="">
                            
                            </div>
                            <div class="service_stars">
                                <label for="">Сервисы</label>
                            <input value="{{ $tour->service_stars }}" class="form-control input" type="number" step="any" placeholder="Сервис" name="service_stars" id="">
                            
                            </div>
                            <div class="eating_stars">
                                <label for="">Еда</label>
                            <input value="{{ $tour->eating_stars }}" class="form-control input" type="number" step="any" placeholder="Еда" name="eating_stars" id="">
                          
                            </div>
                            </div>
                          <div class="days">
                            <div class="days_info">
                                <label for="">Сколько дней</label>
                            <input  value="{{ $tour->days }}" class="form-control input" type="number" step="any" placeholder="Еда" name="days" id="">
                            </div>
                          </div>
                     </div>
                     <div class="star_days">
                        <div class="stars" style="justify-content: start;">
                            <div class="stars_all" >
                                <label for="">longitude</label>
                                <input class="form-control input" value="{{ $tour->longitude }}" type="number" step="any" placeholder="longitude" name="longitude" id="">
                            
                            </div>
                            
                            
                            <div class="eating_stars" >
                                <label for="">latitude</label>
                            <input  class="form-control input" value="{{ $tour->latitude }}" type="number" step="any" placeholder="latitude" name="latitude" id="">
                          
                            </div>
                            </div>
                          <div class="days" style="width: 45%;display:block;">
                            <div class="days_info">
                                <label for="">Имя места</label>
                            <input style="width: 100%;" value="{{ $tour->place_name }}"   class="form-control input" type="text" name="place_name" id="">
                            </div>
                          </div>
                     </div>
                     <div class="subsave">
                        <div class="subtitle">
                            <label for="">Под заголовок</label>
                    <input class="form-control input" type="text" value="{{ $tour->subtitle }}" name="subtitle"  aria-label="default input example">
                         </div>
                         <button type="sublit" class="btn btn-success m-0">Сохранить</button>
            
                     </div>
            </div>

        </form>
        <form action="/tour_room/delete/{{ $tour->id }}" method="POST" class="tour_rooms">

            @csrf
            @method('delete')

            @foreach ($rooms as $room)
            @if($all_rooms->where('id', $room->room_id)->first())
            <div class="card tour_room card-hover mb-7" onclick="window.location = '/room/{{ $room->room_id }}'" style="width: 18rem; cursor:pointer;">
                        <input type="hidden" id="hiddenRoomDelete">
                        <img class="card-img-top" id="find_room_image" src="{{ $all_rooms->where('id', $room->room_id)->first()->avatar }}" alt="Card image cap">
                        <div class="card-body  d-flex justify-content-between align-items-center">
                          <h5 id="find_room_name" class="card-title">{{ $all_rooms->where('id', $room->room_id)->first()->name }}</h5>
                          <button type="submit" onclick="onDeleteItemRoom({{ $all_rooms->where('id', $room->room_id)->first()->id }})"  class="btn btn-danger submit_room_btn">-</button>
                        </div>
            </div>
                     @endif
                     @endforeach
            </form>
        <h3 class="mt-4" >Добавление комнаты</h3>
    <form action="/add_room/{{ $tour->id }}" method="POST">
        @csrf
        <label for="#find_room">Напишите название комнаты</label>
        <input class="form-control input" type="text" name="room" id="find_room"  aria-label="default input example">
        <div class="rooms">
            
        </div>

        </div>
    </form>
   <div class="comments">
    <h2 class="text-center">Коментарии</h2>
    <div class="comment">
        @foreach ($reviews as $review)
            <div class="card m-5 mt-5" style="width: 18rem;">
            <img class="card-img-top" 
            @if($all_review_images->where('revew_id', $review->id)->first() )
            src="{{ $all_review_images->where('revew_id', $review->id)->first()->image }}" alt="Card image cap"
            @else
            src="https://static.vecteezy.com/system/resources/previews/002/089/746/non_2x/creative-minimalist-hand-painted-abstract-arts-background-nature-mountain-landscape-painting-with-japanese-wave-pattern-vector.jpg"
            @endif
            >
            <div class="card-body">
              <h5 class="card-title">{{ $review->stars }} / 5</h5>
              <p class="card-text">{{ substr($review->revew, 0,50) }}...</p>
              <a href="/review/{{ $review->id }}" class="btn btn-primary">Посмотреть</a>
            </div>
        </div>
        @endforeach
        
        
     
    </div>
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
