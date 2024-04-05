export default function slider(wrapperClass) {
    const wrapper = document.querySelector(wrapperClass);
    const carousel = wrapper.querySelector('.carousel');
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = wrapper.querySelectorAll(`${wrapperClass} i`);

    carousel.classList.add("no-transition");
    carousel.classList.remove("no-transition");

    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.classList.contains("left") ? -firstCardWidth : firstCardWidth;
        });
    });
}
