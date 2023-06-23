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
<div class="up" style="width: 90%; height:100px;display:flex;justify-content:space-between;">
    <div class="name_back mb-2 " style="width:340px;">
        <a href="javascript:history.back()">
            <img alt="File:Ic arrow back 36px.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/36px-Ic_arrow_back_36px.svg.png?20141023105457" decoding="async" width="36" height="36" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/54px-Ic_arrow_back_36px.svg.png?20141023105457 1.5x, https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/72px-Ic_arrow_back_36px.svg.png?20141023105457 2x" data-file-width="36" data-file-height="36">
        </a>
    
        <h2 style="width:308px;">Изменить Новость</h2>
    </div>
    <form action="/news/{{ $news->id }}" method="POST" class="tour_newss">
        <button type="submit" class="btn btn-danger">Удалить</button>
        @csrf
        @method('delete')
    
        </form>
</div>

       <div class="tour_photos">
        <div class="tour_photos_title">
            <h3>Фото Новостя</h3>
        </div>
        <div class="images">
            
                    <img src="{{ $news->image }}" style="width:200px;height:200px;border-radius:20px;" alt="">
         </div>
        
            </div>
        </div>

        <div class="add_photo">
            <h4>Изменть фото</h4>
        </div>
        <form action="/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="input-group realprocode control-group lst increment" >
                <div class="input-group-btn"> 
                </div>
              </div>
             <input type="file" name="avatar" id="avatar_news">
              <button class="btn btn-success" type="submit"> <i class="fldemo glyphicon glyphicon-plus"></i>Изменить</button>

        </form>
        <form action="/news/{{ $news->id }}" method="POST" class="tour_info">
            <div class="tour_info_inputs">
                    @csrf
                    @method('PUT')
                         <div class="update_inputs">
                             <div class="first_divs">
                                 <div class="name">
                                     <label for="">Название </label>
                             <input class="form-control input" type="text" value="{{ $news->name }}" name="name" aria-label="default input example">
                                 </div>
             
                     <div class="date">
                         <label for="">Дата</label>
                         <div class="form-floating">
                            <input class="form-control input" type="date" name="date" value="{{ $news->date }}" id="">
                      </div>
                     </div>
                             </div>
                     </div>
                         <div class="second_div">
                
             
                         <div class="form-floating">
                             <textarea class=" input form-control" placeholder="Leave a comment here" name="text" id="floatingTextarea">{{ $news->text }}</textarea>
                         <label for="floatingTextarea">Информация</label>
                       </div>
                    </div>
        
                     
                         <button type="sublit" class="btn btn-success mt-3 mr-5 mb-0">Сохранить</button>
            
                     </div>
            </div>
        </form>
        
        
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
