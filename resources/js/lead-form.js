const modalError = document.querySelector('.modal-blurred');
const modalSuccess = document.querySelector('.success');
const modalWindow = document.querySelector('.modal-lead-form__blurred-bg');
document.getElementById("leadsForm").addEventListener("submit", async (e) => {
    e.preventDefault();
    var csrf = document.getElementsByName("csrf-token")[0].content;

    var data = new FormData(e.target);

    let response = await fetch("", {
        method: "POST",
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf
        },
        body: data,
    });

    var result = await response.json();

    if (response.ok) {
        modalSuccess.classList.add('modal-show')
        setTimeout(function() {
            modalWindow.classList.remove('modal-lead-form__active');
        }, 5000);
        modalError.classList.remove('modal-show');
    } else {
        modalError.classList.add('modal-show');
        modalSuccess.classList.remove('modal-show');
    }
});
