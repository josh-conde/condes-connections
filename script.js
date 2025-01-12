const projectCards = document.querySelectorAll('.card');
const openModal    = document.getElementById('openModal');
const closeModal   = document.getElementById('closeModal');
const modal        = document.getElementById('contactModal');

projectCards.forEach(card => {
    card.addEventListener('click', () => {
        const description = card.querySelector('.hidden');
        if (description) {
            description.classList.toggle('visible');
            card.classList.toggle('fade-background');
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementsByClassName("navbar");

    const track      = document.querySelector(".carousel-track");
    const cards      = Array.from(track.children);
    const cardWidth  = cards[0].getBoundingClientRect().width;
    let currentIndex = 0;

    const updateCarousel = () => {
        const translateX = -currentIndex * cardWidth;
        track.style.transform = `translateX(${translateX}px)`;
    };

    const autoScroll = () => {
        currentIndex = (currentIndex + 1) % cards.length;
        updateCarousel();
    };

    setInterval(autoScroll, 4500);

    navbar.classList.add("fade-in");
  });


openModal.addEventListener('click', () => {
    modal.style.display = 'flex';
});

closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});