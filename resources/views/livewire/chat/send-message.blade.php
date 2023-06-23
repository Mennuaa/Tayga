<div>
    {{-- The whole world belongs to you. --}}

    @if ($selectedConversation)
{{--         
        <form wire:submit.prevent='sendMessage' action="" id="send_message_form">
            <div class="chatbox_footer">
            <div class="custom_form_group">
        
               <div class="sendmessage_div" style="width: 100%;">
                <input wire:model='body' type="text" id="sendMessage" class="control" placeholder="Write message" style="height:45px;">
                <button  wire:click.prevent='sendMessage' type="submit" class="submit send_message_btn">									
                 отправить
                 </button>
               </div>
        </form>	

        <form wire:submit.prevent='sendMessageFile' action="" class="upload">
            <label class="upload__label">
                  <span class="upload__ico">
                          <img src="img/layout/general/upload.png" style="width: 20px;height:20px;" alt="">
                  </span>
                  <input wire:model="file"  type="file" id="file" style="width: 20px;height:20px;" class="upload__input">
            </label>  
            <button  wire:click.prevent='sendMessageFile' type="submit" class="submit">									
                <img src="img/layout/general/send.svg" alt="" style="width: 20px;height:20px;">
            </button>
            

        </form>
            </div>
        
            </div>

    @endif


</div> --}}

@endif
<div class="send_message">
    <div class="send_message_left">
        <form class="send_message_left_info">
            <input wire:model='body' type="text" name="" id="">
            <button wire:click.prevent='sendMessage' > Отправить</button>
        </form>
    </div>
    <div class="send_message_right">
        <div class="send_message_right_info">
            <div class="send_message_right_upload">
                <label class="upload__label">
                    <span class="upload__ico">
                            <img src="img/layout/general/upload.png" style="width: 20px;height:20px;" alt="">
                    </span>
                    <input wire:model="file"  type="file" id="file" style="width: 20px;height:20px;" class="upload__input">
              </label> 
            </div>
            <div class="send_message_right_send">
                <button  wire:click.prevent='sendMessageFile' type="submit" class="submit">									
                    <img src="img/layout/general/send.svg" alt="" style="width: 20px;height:20px;">
                </button>
            </div>
        </div>
    </div>
</div>

