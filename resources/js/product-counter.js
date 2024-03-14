let value = 1;
let price = parseInt(document.getElementById("product-price").innerHTML);
let counterElement = document.getElementById("counter");
let productPriceElement = document.getElementById("product-price");

document.querySelectorAll(".counter-button").forEach((item) => {
    item.addEventListener("click", (e) => {

        if (e.target.classList.contains("sub")) {
            if (value == 0) return;
            value--;
        } else {
            value++
        }

        counterElement.innerText = value;
        productPriceElement.innerText = (value * price).toFixed(2);
    })
})
