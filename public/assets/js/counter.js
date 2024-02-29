let counter = 1;
let price = parseInt(document.getElementById("product-price").innerHTML);
let counterElement = document.getElementById("counter");
let productPriceElement = document.getElementById("product-price");

function counterIncrement() {
    counter++;
    counterElement.innerHTML = counter;
    productPriceElement.innerHTML = (counter * price).toFixed(2);
}

function counterDecrement() {
    if (counter > 1) {
        counter--;
        counterElement.innerHTML = counter;
        productPriceElement.innerHTML  = (counter * price).toFixed(2);
    }
}