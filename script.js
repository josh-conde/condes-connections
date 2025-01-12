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

    navbar.classList.add("fade-in");
  });

document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector(".carousel-track");
    const prevButton = document.querySelector(".carousel-btn.prev");
    const nextButton = document.querySelector(".carousel-btn.next");

    const cards = Array.from(track.children);
    const cardWidth = cards[0].getBoundingClientRect().width;

    let currentIndex = 0;

    const updateCarousel = () => {
        const translateX = -currentIndex * cardWidth;
        track.style.transform = `translateX(${translateX}px)`;
    };

    nextButton.addEventListener("click", () => {
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });

    prevButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
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