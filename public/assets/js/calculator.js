const confirmButton = document.getElementById('confirm-button');
const declineButton = document.getElementById('decline-button');
const areaElement = document.querySelector('#area-block');
const squareElement = document.querySelector('#_area-block');

let isSelect = 0;

document.querySelectorAll('.survey-input').forEach(input => {
    let length = 5;
    input.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.id === "area") {
            length = 10;
        }
        if (this.value.length > length) {
            this.value = this.value.slice(0, length);
        }
    });
});

document.querySelector('#confirm-button').addEventListener('click', function() {
    isSelect = 1;
    areaElement.classList.remove('display-none');
    squareElement.classList.add('display-none');
});

document.querySelector('#decline-button').addEventListener('click', function() {
    isSelect = 0;
    squareElement.classList.remove('display-none');
    areaElement.classList.add('display-none');
});

confirmButton.addEventListener('click', function() {
    confirmButton.classList.add('active-survey-button');
    declineButton.classList.remove('active-survey-button');
});

declineButton.addEventListener('click', function() {
    declineButton.classList.add('active-survey-button');
    confirmButton.classList.remove('active-survey-button');
});

document.querySelector('#survey-submit').addEventListener('click', function() {
    let length  = parseFloat(document.querySelector('#width').value) || 0;
    let height = parseFloat(document.querySelector('#height').value) || 0;
    let windows = parseFloat(document.querySelector('#windows').value) || 0;
    let doors = parseFloat(document.querySelector('#doors').value) || 0;
    let totalArea;

    if (!isSelect) {
        totalArea = length * height - doors * 0.9 * 2 - windows * 1.3 * 1.5 * 2;
    } else {
        totalArea = parseFloat(document.querySelector('#area').value) || 0;
    }

    let recommendedGallons = Math.floor(totalArea / 20);
    let remainingArea = totalArea % 20;
    let recommendedQuarts = Math.ceil(remainingArea / 5);

    if (recommendedQuarts > 2) {
        recommendedGallons++;
        recommendedQuarts = 0;
    }

    document.querySelector('#painting-area').textContent = totalArea < 0 ? 0 : totalArea.toFixed(0);
    document.querySelector('#gallons').textContent = recommendedGallons < 0 ? 0 : recommendedGallons.toFixed(0);
    document.querySelector('#quart').textContent = recommendedQuarts < 0 ? 0 : recommendedQuarts.toFixed(0);
});