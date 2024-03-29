const modalWindow = document.querySelector('.modal-lead-form__blurred-bg');
const button = document.querySelector('.call-modal');
const closeWindowButton = document.querySelector('#close-modal')

button.addEventListener('click', function (){
    if(!modalWindow.classList.contains('modal-lead-form__active')) {
        modalWindow.classList.add('modal-lead-form__active');
    } else {
        modalWindow.classList.remove('modal-lead-form__active');
    }
});

closeWindowButton.addEventListener('click', function (){
   modalWindow.classList.remove('modal-lead-form__active');
});
