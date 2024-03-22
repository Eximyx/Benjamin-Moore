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
    console.log(response);
    var result = await response.json()
    console.log(result);

    const modalError = document.querySelector('.modal-blurred');
    const modalSuccess = document.querySelector('.success');
    if (response.ok) {
        modalSuccess.classList.add('modal-show');
        modalError.classList.remove('modal-show');
    } else {
        console.log("ERROR:", result.message);
        modalError.classList.add('modal-show');
        modalSuccess.classList.remove('modal-show');
    }
});
