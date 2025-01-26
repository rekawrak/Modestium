let currentSlide = 0;
const images = document.querySelectorAll('.additional-photo');
const modal = document.getElementById('modal');
const modalImage = document.getElementById('modalImage');
const caption = document.getElementById('caption');

function openModal(index) {
    modal.style.display = 'block';
    showSlide(index);
}

function closeModal() {
    modal.style.display = 'none';
}

function showSlide(index) {
    currentSlide = index;
    modalImage.src = images[currentSlide].src;
    caption.innerHTML = images[currentSlide].alt;
}

function changeSlide(n) {
    currentSlide = (currentSlide + n + images.length) % images.length;
    showSlide(currentSlide);
}