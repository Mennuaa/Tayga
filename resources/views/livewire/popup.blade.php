<section id="popup" class="popup">
    <a href="#" class="popup__area"></a>
    <div class="popup__body">
        <div class="popup__contnet">
            <div class="popup__top">
                <h2 class="popup__title">Сделать запрос</h2>
                <a href="#" class="popup__clous">X</a>
            </div>
            <div class="popup_contacts">
                <div class="popup_contacts_info">
                    <div class="popup_call_us"> 
                    <a href="" class="account">
                        <div class="account__img">
                            <img src="{{ $user->image }}" alt="" style=
                            "border-radius: 50%;
                            background-color:none;
                            width: 38px;
                            height: 38px;">
                        </div>
                        <div style="color:white" class="account__person">{{ $user->name }}</div>
                    </a>
                    <input type="text" name="articul" class="popup__input" placeholder="Введите артикул" id="articul">
                   <div class="popup-hidden-div">
                    <div id="popup_image_div" class="popup_image_div"><img src="#" id="popup_image" class="popup_img" /></div>
                   <div class="popup-inputs-sq">
                    <input placeholder="Размер" type="number"  name="size" id="popup-size">
                    <input type="number" placeholder="Количество" name="quantity" id="popup-quantity">
                   </div>
                   </div>
                    <button onclick="sendRequest()" class="popup__btn">Отправить</button>

                    </div>
            <div class="footer__item">
                <ul class="footer__social">
                    <li class="footer__subitem"><a class="footer__link" href=""><img src="/icon/telegram.png" alt=""></a></li>
                    <li class="footer__subitem"><a class="footer__link" href=""><img src="/icon/facebook.png" alt=""></a></li>
                    <li class="footer__subitem"><a class="footer__link" href=""><img src="/icon/instagram.png" alt=""></a></li>
                </ul>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
var film
    let input = document.getElementById('articul');
    const popup_image = document.getElementById('popup_image');
    const popup_image_div = document.querySelector('.popup-hidden-div');
    // Init a timeout variable to be used below
    let timeout = null;
    
    // Listen for keystroke events
    input.addEventListener('keyup', function (e) {
        clearTimeout(timeout);
    
        // Make a new timeout set to go off in 1000ms (1 second)
        timeout = setTimeout(function () {
            fetch('http://localhost:8000/api/film')
            .then((response) => {
        return response.json();
      })
      .then((data) => {
        for (let i = 0; i < data.length; i++) {
            const element = data[i];
            console.log(element);
            if(input.value == element.code){
                
                popup_image_div.style = "display:block"
                popup_image.src = element.image

                 film = element
            }
        }
      })
        }, 1000);
    });
   
    const sendRequest = () => {
        window.livewire.emit('sendRequest', film ,document.getElementById('popup-quantity').value,  document.getElementById('popup-size').value);
      
    }
        </script>