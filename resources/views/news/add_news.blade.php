@extends('layouts.user_type.auth')

@section('content')
<div class="name_back mb-2">
    <a href="javascript:history.back()">
        <img alt="File:Ic arrow back 36px.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/36px-Ic_arrow_back_36px.svg.png?20141023105457" decoding="async" width="36" height="36" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/54px-Ic_arrow_back_36px.svg.png?20141023105457 1.5x, https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ic_arrow_back_36px.svg/72px-Ic_arrow_back_36px.svg.png?20141023105457 2x" data-file-width="36" data-file-height="36">
    </a>

    <h2>Добавить Новость</h2>
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

@if(session('couldntCreate'))

            <div class="alert alert-danger mt-4 mb-4 w-40" role="alert">
                     <span class="text-light"> {{  session()->pull('couldntCreate')}}</span>
                    </div>
                    <script>
                    let error = document.querySelector('.alert-danger');
                    setTimeout(() => {
                        error.style.display = 'none';
                    }, 3000);

                </script>
@endif
        <form action="{{ route('news.create') }}"  method="POST" enctype="multipart/form-data" >
            @csrf
            @method('post')
                 <div class="update_inputs">
                     <div class="first_divs">
                         <div class="name">
                             <label for="">Название </label>
                     <input class="form-control input" value="{{ old('name', $request->name) }}" type="text" name="name" aria-label="default input example">
                         </div>
     
             <div class="date">
                 <label for="">Дата</label>
                 <input class="form-control input" value="{{ old('rating', $request->rating) }}" name="date" type="date"  aria-label="default input example">
             </div>
                     </div>
             </div>
                 <div class="second_div">
        
     
                 <div class="form-floating">
                     <textarea class=" input form-control" placeholder="Leave a comment here" name="text" id="floatingTextarea">
                       {{ old('comforts', $request->comforts) }}
                     </textarea>
                 <label for="floatingTextarea">Текст</label>
               </div>
               <input style="width: 290px; height:40px;" type="file" name="avatar"   class="myfrm form-control mr-2">

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
@endsection


