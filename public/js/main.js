<<<<<<< HEAD
$(document).ready(function(){

  
  $('.load__head').on('click', function() {
    $('.load__drop').slideToggle();
  });

  $('.filter__ico').on('click', function() {
    $('.filter__drop').slideToggle();
  });

  $('.status__head').on('click', function() {
    $('.status__list').slideToggle();
  });

  $('.open').on('click', function() {
    $(this).toggleClass('active');
    $(this).closest('.table__inner').children('.table__inline').toggleClass('active');
    return false;
  });

  const icons = document.querySelectorAll('.nav-open');
    icons.forEach (icon => {  
      icon.addEventListener('click', (event) => {
        icon.classList.toggle("open");
      });
    });

    $('.nav-open').on('click', function() {
      $('.nav').slideToggle();
    });

});	



window.addEventListener('rowChatToBottom', event => {

  $('.chat__body').scrollTop($('.chat__body')[0].scrollHeight);

});
const onscrollbody = () => {
  // alert('aahsd');
  var top = $('.chat__body').scrollTop();
  //   alert('aasd');
  if (top == 0) {

      window.livewire.emit('loadMore');
  }


// const chatBody = document
}  


window.addEventListener('updatedHeight', event => {
    let old = event.detail.height;
  //  console.log(old);
    let newHeight = $('.chat__body')[0].scrollHeight;

    let height = $('.chat__body').scrollTop(newHeight - old);


    window.livewire.emit('updateHeight', {
        height: height,
    });


}); 
=======
let timeout = null;
const find_room_image = document.getElementById('find_room_image');
const rooms = document.querySelector('.rooms');
const find_room_name = document.getElementById('find_room_name');
let h1 = document.getElementById('hqq');
let input = document.getElementById('find_room');
if (input) {
  input.addEventListener('keyup', function (e) {
    clearTimeout(timeout);

    timeout = setTimeout(function () {
        (async () => {
            const rawResponse = await fetch('http://localhost:8000/api/add_room_tour', {
              method: 'POST',
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({name: input.value})
            });
            const content = await rawResponse.json();
            content.forEach(element => {
                rooms.style = "display:flex"
                $('.rooms').append(
                    ` <div class="find_room mb-3">
        <input type="hidden"  value="" id="hiddenRoom">

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" id="find_room_image" src="${element.avatar}" alt="Card image cap">
                        <div class="card-body">
                          <h5 id="find_room_name" class="card-title">${element.name}</h5>
                          <button type="submit" onclick="onClickItemRoom(${element.id})"  class="btn btn-primary submit_room_btn">Добавить</button>
                        </div>
                    </div>
                </div>`
                )
                setTimeout(() => {
                    rooms.style = "display:none"
                }, 20000);
            });
          })();
    }, 1000);
});
}

const onClickItemRoom = (id) => {
  const hidden_room_input = document.getElementById('hiddenRoom');
  hidden_room_input.value = id;
  hidden_room_input.name = "room_id"
  // alert(id)
}

const onDeleteItemRoom = (id) => {
  const hidden_room_input = document.getElementById('hiddenRoomDelete');
  hidden_room_input.value = id;
  hidden_room_input.name = "room_id"
  // alert(id)
}
if(localStorage.getItem('delete_review') !== null){
  alert('Комментарий был успешно удален')
  localStorage.removeItem('delete_review');
}
>>>>>>> aa3445f (projects done)
