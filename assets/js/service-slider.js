document.addEventListener('DOMContentLoaded', function() {
    const swiperEl = document.querySelector('.mySwiper');
    if (swiperEl) {
        const slideCount = swiperEl.querySelectorAll('.swiper-slide').length;
        
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: Math.min(slideCount, 1),
            spaceBetween: 25,
            loop: slideCount > 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: Math.min(slideCount, 2),
                },
                1024: {
                    slidesPerView: Math.min(slideCount, 3),
                },
                1200: {
                    slidesPerView: Math.min(slideCount, 4),
                }
            }
        });
    }
});