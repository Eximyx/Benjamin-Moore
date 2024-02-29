const accordion = document.querySelector('.mobile-filter__button')
const body = document.querySelector('.catalog-form')

accordion.addEventListener('click', () => {
    body.classList.toggle('active')
});



