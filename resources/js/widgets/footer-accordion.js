const acc = document.getElementsByClassName("footer-accordion");
let i;

let isAccordionOpen = false;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active-accordion");

        const arrow = this.querySelector(".footer-accordion__arrow");


        /* Toggle between hiding and showing the active panel */
        const panel = this.nextElementSibling;
        if (isAccordionOpen) {
            panel.classList.remove("active-accordion");
            arrow.classList.remove("rotate-arrow");
        } else {
            panel.classList.add("active-accordion");
            arrow.classList.add("rotate-arrow");
        }
        isAccordionOpen = !isAccordionOpen
    });
}
