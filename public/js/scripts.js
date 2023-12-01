
$(document).ready(function () {
    const header = $("header");
    const menu = $("#menu-icon");
    const navmenu = $(".navmenu");
  
    $(window).scroll(function () {
      header.toggleClass("sticky", $(this).scrollTop() > 0);
    });
  
    menu.click(function () {
      menu.toggleClass("bx-x");
      navmenu.toggleClass("open");
    });
  
  
  });
  $("#myEcommerceCarousel").owlCarousel({
    items: 1, // Número de itens a serem exibidos
 


  
  });

window.addEventListener('message', event => {
 
   alertify.set('notifier', 'position', 'top-right');
   alertify.notify(event.detail.title, event.detail.type);


});

$(document).ready(function () {
  const cashOnDeliveryButton = $('[data-value="Cash on Delivery"]');
  const onlinePaymentButton = $('[data-value="Online Payment"]');
  const cashOnDeliveryMode = $('#cashOnDeliveryMode');
  const onlinePaymentMode = $('#onlinePaymentMode');

  cashOnDeliveryButton.click(function () {
      onlinePaymentMode.fadeOut(300, function () {
          cashOnDeliveryMode.fadeIn(300);
      });
  });

  onlinePaymentButton.click(function () {
      cashOnDeliveryMode.fadeOut(300, function () {
          onlinePaymentMode.fadeIn(300);
      });
  });
});
const allHoverImages = document.querySelectorAll('.hover-container div img');
const imgContainer = document.querySelector('.img-container');



allHoverImages.forEach((image) => {
    image.addEventListener('click', () =>{
        imgContainer.querySelector('img').src = image.src;
        resetActiveImg();
        image.parentElement.classList.add('active');
    });
});

function resetActiveImg(){
    allHoverImages.forEach((img) => {
        img.parentElement.classList.remove('active');
    });
}

document.getElementById('mostrarBusca').addEventListener('click', function() {
  var campoBusca = document.getElementById('campoBusca');
  
  if (campoBusca.style.display === 'none' || campoBusca.style.display === '') {
      campoBusca.style.display = 'block';
  } else {
      campoBusca.style.display = 'none';
  }
});

 