const burgerMenuElement = document.querySelector(".burger-menu");
const bodyElement = document.querySelector("body");
document.querySelector(".menu").addEventListener("click", function () {
    this.classList.toggle("opened");
    burgerMenuElement.classList.toggle("burger-opened");
    bodyElement.classList.toggle("scroll-hidden");
});

document.querySelector(".mobile-header .menu").addEventListener("click", function () {
    this.classList.toggle("opened");
    burgerMenuElement.classList.toggle("burger-opened");
    bodyElement.classList.toggle("scroll-hidden");
});
