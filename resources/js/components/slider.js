import slider from "./universal-carousel.js";
const recommendedWrapper = document.querySelector(".recommendedWrapper");
window.addEventListener("DOMContentLoaded", () => {
    slider(".wrapper")
    if(!recommendedWrapper){
        slider(".reviewsWrapper")
    } else {
        slider(".recommendedWrapper")
    }

});

