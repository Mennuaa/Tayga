
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
    
        <h2 style="width:308px;">сообщение</h2>
    </div>
    <form action="/contact_us/{{ $contact_us->id }}" method="POST" class="tour_newss">
        <button type="submit" class="btn btn-danger">Удалить</button>
        @csrf
        @method('delete')
    
        </form>
</div>
<h4 class="m-5">{{ $contact_us->email }}</h4>
<p class="m-5">{{ $contact_us->message }}</p>

        
                     
                        
                     </div>
            </div>
        </form>
        
@endsection
