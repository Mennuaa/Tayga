<div>
    {{-- Stop trying to control. --}}

    @if ($selectedConversation)
    <div id="ex1" class="modal order-popup">
        <span class="close_req_modal" style="
            position: absolute;
            top: 10px;
            cursor: pointer;
            font-size: 20px;
            right: 24px;
            font-weight: bold;">X</span>
        <form action="" class="order">
            <div class="order__top">
                <div class="order__main">
                    <div class="order__subtitle">ФИО</div>
                    <div class="order__person">{{ auth()->user()->name }}</div>
                </div>
                <div class="order__section">
                    <div class="order__item">
                        <div class="order__subtitle">Электронная почта</div>
                        <a href="#" class="order__contact">Olga@maiI.ru</a>
                    </div>
    
                     <div class="order__item">
                        <div class="order__subtitle">Номер телефона</div>
                        <a href="#" class="order__contact">8-707-488-22-22</a>
                    </div>
                </div>
    
                 <div class="order__section">
                    <div class="order__item">
                        <div class="order__subtitle">Электронная почта</div>
                        <a href="#" class="order__contact">Olga@maiI.ru</a>
                    </div>
    
                     <div class="order__item">
                        <div class="order__subtitle">Номер телефона</div>
                        <a href="#" class="order__contact">8-707-488-22-22</a>
                    </div>
                </div>
            </div>
    
            <div class="status">
                <div class="status__title">Статус заявки</div>
                <div class="status__inner">
                    <div class="status__head">
                        <div class="status__item">Резерв подтвержден</div>
                        <img src="img/layout/general/arrow-down.png" alt="">
                    </div>
                    <div class="status__list">
                         <div class="status__item status__confirm">Резерв подтвержден</div>
                         <div class="status__item status__unconfirm">Резерв не подтвержден</div>
                         <div class="status__item status__cancel">Заявка отменена</div>
                         <div class="status__item status__done">Заявка выполнена</div>
                    </div>
                </div>
            </div>
    
            <div class="order__img">
                <img src="{{ $this->film ? $this->film['image'] : ""}}" alt="">
            </div>
    
            <div class="order__inline">
                <div class="order__title">{{ $this->film ? $this->film['name'] : ""}}</div>
                <div class="order__article">
                    <div>Артикул:</div>
                    <div> {{ $this->film ? $this->film['code']  : ""}}</div>
                </div>
            </div>
    
            <div class="options">
                <div class="options__section">
                    <div class="options__item">
                        <div class="options__label">Размер</div>
                        <div class="options__input">
                            <input type="text" placeholder="20м">
                        </div>
                    </div>
                    <div class="options__item">
                        <div class="options__label">Шт.</div>
                        <div class="options__input">
                            <input type="text" placeholder="2">
                        </div>
                    </div>
                </div>
    
                <div class="options__section">
                    <div class="options__item">
                        <div class="options__label">Размер</div>
                        <div class="options__input">
                            <input type="text" placeholder="20м">
                        </div>
                    </div>
                    <div class="options__item">
                        <div class="options__label">Шт.</div>
                        <div class="options__input">
                            <input type="text" placeholder="2">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                      let status__item = document.querySelector('.status__head');
      status__item.addEventListener("click", ()=>{
        const status__list = document.querySelector('.status__list');
        if(status__list.style.display == "none"){
            status__list.style ="display:block"
        }else{
            status__list.style ="display:none"

        }
      })
            </script>
            <div class="order__text">
                <textarea name="" placeholder="Комментарий "></textarea>
            </div>
    
            <button class="order__btn button">Ответить</button>
    
        </form>
    </div>
        <div class="chatbox_header">

            <div class="return">
                <i class="bi bi-arrow-left"></i>
            </div>

            <div class="img_container">
                <img src="https://ui-avatars.com/api/?name={{ $receiverInstance->name }}" alt="">

            </div>


            <div class="name">
                {{ $receiverInstance->name }}
            </div>


            <div class="info">

            </div>
        </div>

        <div class="chatbox_body">
            @foreach ($messages as $message)
                <div class="msg_body  {{ auth()->id() == $message->sender_id ? 'msg_body_me' : 'msg_body_receiver' }}"
                    style="width:80%;max-width:80%;max-width:max-content">
                    @if ($message->type == 'image')
                      <a href="{{ $message->body }}" target="_blank">
                        <img src="{{ $message->body }}" alt="" class="chat_image">
                      </a>
                    @elseif ($message->type == null)
                   <span class="message_body"> {{ $message->body }}</span>
                   @elseif ($message->type == 'request')
                   <div class="message_request">
                    @php

                    $request = $requests->where("id", $message->request_id)->first();
                    $film = $films->where("id", $request->film_id)->first();
                   
                @endphp
                    <img src="{{ $message->body }}" alt="" class="chat_image">
                    <a wire:click="$emit('getFilm', {{ $film }})"  class="message_request_btn">Посмотреть</a>
                    <div class="message_request_info">

                        <span>{{ $requests->where("id", $message->request_id)->first()->size }}</span><span>{{ $requests->where("id", $message->request_id)->first()->quantity }}</span>
                    </div>
                   </div>
                   <script>
                         let requestModal = document.getElementById('ex1');
                        const message_request_btn = document.querySelectorAll('.message_request_btn');
                            message_request_btn.forEach(el=>{
                                el.addEventListener('click', () => {
                                    requestModal.style = "display:block"
                                });
                            })
                            const close_req_modal = document.querySelector('.close_req_modal');
                            close_req_modal.addEventListener("click", () =>{
                                requestModal.style = "display:none"

                            })
                   </script>
                      @else
                      <a href="{{ $message->body }}" download>
                        Скачать
                        <img src="https://www.iconpacks.net/icons/2/free-file-icon-1453-thumb.png" alt="" class="chat_image">
                      </a>
                   @endif

                    <div class="msg_body_footer">
                        <div class="date">
                            {{ $message->created_at->format('m: i a') }}
                        </div>

                        <div class="read">
                            
                            @php
                                
                          if($message->user->id === auth()->id()){

                
                                    if($message->read == 0){


                                        echo'<i class="bi bi-check2 status_tick "></i> ';
                                    }
                                    else {
                                        echo'<i class="bi bi-check2-all text-primary  "></i> ';
                                    }

                          }


                            @endphp
                      

                        </div>
                    </div>
                </div>
            @endforeach
                
        </div>
        


        <x-footer></x-footer>
        <script>
            $(".chatbox_body").on('scroll', function() {
                // alert('aahsd');
                var top = $('.chatbox_body').scrollTop();
                //   alert('aasd');
                if (top == 0) {

                    window.livewire.emit('loadmore');
                }

            });
        </script>


        <script>
           window.addEventListener('updatedHeight', event => {

let old = event.detail.height;
let newHeight = $('.chatbox_body')[0].scrollHeight;

let height = $('.chatbox_body').scrollTop(newHeight - old);


window.livewire.emit('updateHeight', {
    height: height,
});


});
        </script>
    @else
        <div class="fs-4 text-center text-primary mt-5">
            Выберите чат
        </div>




    @endif


    <script>
 


        window.addEventListener('rowChatToBottom', event => {

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);

        });
    </script>


<script>

    $(document).on('click','.return',function(){


window.livewire.emit('resetComponent');

    });
</script>
 

<script>

window.addEventListener('markMessageAsRead',event=>{
 var value= document.querySelectorAll('.status_tick');

 value.array.forEach(element, index => {
     

    element.classList.remove('bi bi-check2');
    element.classList.add('bi bi-check2-all','text-primary');
 });

});

</script>
	
<link rel="stylesheet" type="text/css" href="/lib/jquery-modal-master/jquery.modal.min.css"> 
	
<script src="/lib/jquery-3.6.3.min.js"></script>
<script src="/lib/jquery-modal-master/jquery.modal.min.js"></script>
<script defer src="/js/main.js?v=0.0.1"></script>
</div>
