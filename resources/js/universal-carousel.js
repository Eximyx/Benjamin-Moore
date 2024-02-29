export default function slider(wrapperClass, columnAmount) {
    const wrapper = document.querySelector(wrapperClass);
    const carousel = wrapper.querySelector('.carousel');
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = wrapper.querySelectorAll(`${wrapperClass} i`);
    const carouselChildrens = [...carousel.children];

    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });

    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");

    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.classList.contains("left") ? -firstCardWidth : firstCardWidth;
            // carousel.scrollLeft += btn.id == "left-btn" ? -firstCardWidth : firstCardWidth;
        });
    });
}