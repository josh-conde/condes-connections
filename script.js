document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementsByClassName("navbar");

    navbar.classList.add("fade-in");
  });

const projectCards = document.querySelectorAll('.card');

projectCards.forEach(card => {
    card.addEventListener('click', () => {
        const description = card.querySelector('.hidden');
        if (description) {
            description.classList.toggle('visible');
            card.classList.toggle('fade-background');
        }
    });
});