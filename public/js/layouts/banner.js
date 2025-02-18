// Hàm hiển thị slide
function showSlide(index, slider) {
    const slidesContainer = slider.querySelector('.m_slides');
    const totalSlides = slidesContainer.querySelectorAll('img').length;

    // Xử lý logic vòng lặp vô hạn
    if (index >= totalSlides) {
        index = 0; // Quay lại slide đầu tiên nếu vượt quá
    } else if (index < 0) {
        index = totalSlides - 1; // Quay lại slide cuối cùng nếu nhỏ hơn 0
    }

    // Tính toán vị trí dịch chuyển
    const offset = -index * 100;
    slidesContainer.style.transform = `translateX(${offset}%)`;

    // Lưu trạng thái hiện tại của slider
    slider.dataset.currentSlide = index;
}

// Hàm chuyển đến slide tiếp theo
function nextSlide(button) {
    const slider = button.closest('.m_slider');
    const currentSlide = parseInt(slider.dataset.currentSlide || 0, 10);
    showSlide(currentSlide + 1, slider);
}

// Hàm chuyển đến slide trước đó
function prevSlide(button) {
    const slider = button.closest('.m_slider');
    const currentSlide = parseInt(slider.dataset.currentSlide || 0, 10);
    showSlide(currentSlide - 1, slider);
}