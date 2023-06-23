@extends('layouts.user_type.auth')

@section('content')
<div class="name_back mb-2">
    <a href="javascript:history.back()">
        <img alt="File:Ic arrow back 36px.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/36px-Ic_arrow_back_36px.svg.png?20141023105457" decoding="async" width="36" height="36" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/54px-Ic_arrow_back_36px.svg.png?20141023105457 1.5x, https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/72px-Ic_arrow_back_36px.svg.png?20141023105457 2x" data-file-width="36" data-file-height="36">
    </a>

    <h2>Добавить тур</h2>
</div>
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
        <form action="{{ route('tour.add') }}"  method="POST" enctype="multipart/form-data" >
            @csrf
            @method('post')
                 <div class="update_inputs">
                     <div class="first_divs">
                         <div class="name">
                             <label for="">Название </label>
                     <input class="form-control input" type="text" name="name" aria-label="default input example">
                         </div>
     
             <div class="date">
                 <label for="">Дата</label>
                 <input class="form-control input" name="date" type="date"  aria-label="default input example">
             </div>
                     </div>
             </div>
                 <div class="second_div">
        
     
                 <div class="form-floating">
                     <textarea class=" input form-control" placeholder="Leave a comment here" name="text" id="floatingTextarea"></textarea>
                 <label for="floatingTextarea">Текст</label>
               </div>
               <div class="form-floating">
                <textarea class=" input form-control"  placeholder="Leave a comment here" name="tour_privilages" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Привилегии</label>
          </div>
            </div>

             <div class="third_div">
                <div class="price">
                    <label for="">Цена</label>
                      <input class="form-control input" type="number" name="price"  aria-label="default input example">
                 </div>
                 <div class="form-floating">
                    <textarea class=" input form-control" style="width: 100%;"  placeholder="comment" name="tour_advantages" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Что входит в стоимость тура</label>
              </div>
             </div>
             <div class="subtitle">
                <label for="">Под заголовок</label>
              <input class="form-control input" type="text" name="subtitle"  aria-label="default input example">

              </div>
              <div class="star_days">
                <div class="stars">
                    <div class="stars_all">
                        <label for="">Общее</label>
                        <input class="form-control input" type="number" step="any" placeholder="Звезды" name="stars" id="">
                    
                    </div>
                    <div class="placement_stars">
                        <label for="">Размещение</label>
                    <input  class="form-control input" type="number" step="any" placeholder="Размещение" name="placement_stars" id="">
                    
                    </div>
                    <div class="service_stars">
                        <label for="">Сервисы</label>
                    <input class="form-control input" type="number" step="any" placeholder="Сервис" name="service_stars" id="">
                    
                    </div>
                    <div class="eating_stars">
                        <label for="">Еда</label>
                    <input  class="form-control input" type="number" step="any" placeholder="Еда" name="eating_stars" id="">
                  
                    </div>
                    </div>
                  <div class="days">
                    <div class="days_info">
                        <label for="">Сколько дней</label>
                    <input   class="form-control input" type="number" step="any" placeholder="Еда" name="days" id="">
                    </div>
                  </div>
             </div>
             <div class="star_days">
              <div class="stars" style="justify-content: start;">
                  <div class="stars_all" >
                      <label for="">longitude</label>
                      <input class="form-control input" type="number" step="any" placeholder="longitude" name="longitude" id="">
                  
                  </div>
                  
                  
                  <div class="eating_stars" >
                      <label for="">latitude</label>
                  <input  class="form-control input" type="number" step="any" placeholder="latitude" name="latitude" id="">
                
                  </div>
                  </div>
                <div class="days" style="width: 45%;display:block;">
                  <div class="days_info">
                      <label for="">Имя места</label>
                  <input style="width: 100%;"   class="form-control input" type="text" name="place_name" id="">
                  </div>
                </div>
           </div>
                <div class="add_photo">
                    <h4>Добавить фото</h4>
                </div>
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
              
                
            </div>
              

             <div class="inputs">
                <div  class="inputs_up">

                 <div class="mb-3">
                     
                   </div>
                 <a><button type="submit" class="inputs_up_button" >Добавить</button></a>
                 </div>
            </form>
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


