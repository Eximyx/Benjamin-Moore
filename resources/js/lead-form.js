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

    if (response.ok) {
        console.log("ACCESS:", result)
    } else {
        console.log("ERROR:", result.message);
    }
});
