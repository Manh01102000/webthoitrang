$(document).ready(function () {
    $('.m_slider').each(function () {
        let slider = $(this);
        slider.data('currentSlide', 0);
        startAutoSlide(slider);
    });
});

function showSlide(index, slider) {
    let slidesContainer = slider.find('.m_slides');
    let totalSlides = slidesContainer.find('img').length;

    if (index >= totalSlides) {
        index = 0;
    } else if (index < 0) {
        index = totalSlides - 1;
    }

    let offset = -index * 100;
    slidesContainer.css('transform', `translateX(${offset}%)`);
    slider.data('currentSlide', index).attr('data-current-slide', index);
}

function nextSlide(button) {
    let slider = $(button).closest('.m_slider');
    changeSlide(slider, 1);
}

function prevSlide(button) {
    let slider = $(button).closest('.m_slider');
    changeSlide(slider, -1);
}

function changeSlide(slider, step) {
    let currentSlide = slider.data('currentSlide') || 0;
    showSlide(currentSlide + step, slider);
    resetAutoSlide(slider);
}

function startAutoSlide(slider, interval = 3000) {
    let autoSlideInterval = setInterval(function () {
        let currentSlide = slider.data('currentSlide') || 0;
        showSlide(currentSlide + 1, slider);
    }, interval);
    slider.data('autoSlideInterval', autoSlideInterval);
}

function resetAutoSlide(slider) {
    clearInterval(slider.data('autoSlideInterval'));
    startAutoSlide(slider);
}
