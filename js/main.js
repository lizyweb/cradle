document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  // Sticky Navbar
  // $(window).scroll(function () {
  //   if ($(this).scrollTop() > 300) {
  //       $('.sticky-top').addClass('shadow-sm').css('top', '0px');
  //   } else {
  //       $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
  //   }
  // });

  // Spinner
  var spinner = function () {
    setTimeout(function () {
        if ($('#spinner').length > 0) {
            $('#spinner').removeClass('show');
        }
    }, 1);
  };
  spinner();


  // Testimonials carousel
$(".testimonial-carousel").owlCarousel({
  autoplay: true,
  smartSpeed: 1000,
  items: 1,
  dots: true,
  loop: true,
});


//Page Slider

function pageSlider() {
  $('.page-slider').slick({
      fade: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      dots: false,
      speed: 600,
      arrows: true,
      prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
  });
}
pageSlider();

  (function ($) {
    
    // ****************************
    // :: 2.0 ClassyNav Active Code
    // ****************************

    if ($.fn.classyNav) {
        $('#robertoNav').classyNav();
    }

    })(jQuery);

});

document.addEventListener("DOMContentLoaded", function () {
  // Create a new button element
  var closeButton = document.createElement("button");
  closeButton.type = "button";
  closeButton.className = "close d-flex align-items-center justify-content-center";
  closeButton.setAttribute("data-dismiss", "modal");
  closeButton.setAttribute("aria-label", "Close");

  // Create an icon element for the close button
  var closeIcon = document.createElement("i");
  closeIcon.className = "bi bi-x";
  closeIcon.setAttribute("aria-hidden", "true");

  // Append the icon to the button
  closeButton.appendChild(closeIcon);

  // Find the modal content and append the close button
  var modalContent = document.querySelector("#exampleModal .modal-content");
  if (modalContent) {
      modalContent.insertBefore(closeButton, modalContent.firstChild);

      // Attach a click event listener to close the modal
      closeButton.addEventListener("click", function () {
          $('#exampleModal').modal('hide');
      });
  }
});