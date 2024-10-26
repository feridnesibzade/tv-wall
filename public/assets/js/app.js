const swiper = new Swiper(".partners__slider .swiper", {
    loop: true,
    slidesPerView: 5,
    spaceBetween: 75,
    freeMode: true,
    centeredSlides: true,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        reverseDirection: "reverse",
    },
    speed: 4000,
});
const swiper2 = new Swiper(".feedback .swiper", {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 24,
    navigation: {
        prevEl: ".feedback .slider-prev",
        nextEl: ".feedback .slider-next",
    },
    breakpoints: {
        350: {
            slidesPerView: 1, 
            spaceBetween: 16, 
        },
        668: {
            slidesPerView: 2, 
            spaceBetween: 16, 
        },
        1024: {
            slidesPerView: 3, 
            spaceBetween: 24,
        },
    },
});
const navigation = document.querySelector("header .navigation");
const blur = document.getElementById("blur");
navigation.addEventListener(
    "mouseenter",
    (e) => {
        if (e.target.classList.contains("has__dropdown")) {
            blur.classList.add("show");
        }
    },
    true
);

navigation.addEventListener(
    "mouseleave",
    (e) => {
        if (e.target.classList.contains("has__dropdown")) {
            blur.classList.remove("show");
        }
    },
    true
);



document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('.menu');
    const rightMenu = document.querySelector('.side__menu'); 
    const closeMenu = document.querySelector('.close__menu'); 
  
    if (menuButton) {
      menuButton.addEventListener('click', function() {
        rightMenu.classList.add('open'); 
      });
      closeMenu.addEventListener('click', function() {
        rightMenu.classList.remove('open'); 
      });

    }
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    const dropdownHeaders = document.querySelectorAll('.has__dropdown__rwd > a');

    dropdownHeaders.forEach(header => {
        header.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownContainer = this.nextElementSibling;
            dropdownContainer.classList.toggle('dropdown__open');
        });
    });
});


function toggleFAQ(element) {
    const faqItem = element.parentElement;
    const isActive = faqItem.classList.contains('active');
    document.querySelectorAll('.faq__item').forEach((item) => {
        item.classList.remove('active');
    });

    if (!isActive) {
        faqItem.classList.add('active');
    }
}
