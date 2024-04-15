document.addEventListener('DOMContentLoaded', () => {
    "use strict";
  
    /**
     * Sticky header on scroll
     */
    const selectHeader = document.querySelector('#header');
    if (selectHeader) {
      document.addEventListener('scroll', () => {
        window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
      });
    }
  
    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = document.querySelectorAll('#navbar .scrollto');
  
    function navbarlinksActive() {
      navbarlinks.forEach(navbarlink => {
  
        if (!navbarlink.hash) return;
  
        let section = document.querySelector(navbarlink.hash);
        if (!section) return;
  
        let position = window.scrollY;
        if (navbarlink.hash != '#header') position += 200;
  
        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          navbarlink.classList.add('active');
        } else {
          navbarlink.classList.remove('active');
        }
      })
    }
    window.addEventListener('load', navbarlinksActive);
    document.addEventListener('scroll', navbarlinksActive);
  
    /**
     * Mobile nav toggle
     */
    const mobileNavToogle = document.querySelector('.mobile-nav-toggle');
    if (mobileNavToogle) {
      mobileNavToogle.addEventListener('click', function(event) {
        event.preventDefault();
  
        document.querySelector('body').classList.toggle('mobile-nav-active');
  
        this.classList.toggle('bi-list');
        this.classList.toggle('bi-x');
      });
    }
  
    /**
     * Toggle mobile nav dropdowns
     */
    const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');
  
    navDropdowns.forEach(el => {
      el.addEventListener('click', function(event) {
        if (document.querySelector('.mobile-nav-active')) {
          event.preventDefault();
          this.classList.toggle('active');
          this.nextElementSibling.classList.toggle('dropdown-active');
  
          let dropDownIndicator = this.querySelector('.dropdown-indicator');
          dropDownIndicator.classList.toggle('bi-chevron-up');
          dropDownIndicator.classList.toggle('bi-chevron-down');
        }
      })
    });
  
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
    var modalContent = document.querySelector("#exampleModalQR .modal-content");
    if (modalContent) {
        modalContent.insertBefore(closeButton, modalContent.firstChild);
  
        // Attach a click event listener to close the modal
        closeButton.addEventListener("click", function () {
            $('#exampleModalQR').modal('hide');
        });
    }
  });