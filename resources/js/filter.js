const accordion = document.querySelector('.mobile-filter__button');
const body = document.querySelector('.catalog-form');
const jobsButton = document.querySelector('#jobs-button');
const seriesButton = document.querySelector('#series-button');
const colorsButton = document.querySelector('#colors-button');
const sortAlphabeticButton = document.querySelector('#sortAlphabeticButton');
const sortNumericButton = document.querySelector('#sortNumericButton');

if(accordion){
    accordion.addEventListener('click', () => {
        body.classList.toggle('active');
    });
}

var csrf = document.getElementsByName("csrf-token")[0].content;
var search = document.getElementById("search-result");

let form = document.getElementById("catalog");
let colors = [];
let categories = [];

let data = {
    "kind_of_work_id": [],
    "color_id": [],
    "product_category_id": [],
    "price[from]": "",
    "price[to]": "",
};

let selectedColors = {};
let count = 0;
let buttonInnerHtml = jobsButton.innerHTML;

document.addEventListener("DOMContentLoaded", function() {
    let checkboxes = body.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
});

let fetchFormData = (element) => {
    if (element.name in data) {
        let id = element.id.split("_")[1];
        if (id !== undefined) {
            if (element.checked) {
                data[element.name].push(id);
            } else {
                let index = data[element.name].indexOf(id)
                data[element.name].splice(index, 1);
            }
        } else {
            data[element.name] = element.value;
        }
    }
};

let page = 1;

function objectToFormData(object) {
    let formData = new FormData();
    Object.entries(object).forEach(([key, obj]) => {
        if (typeof obj === 'object' && obj != null) {
            for (let i = 0; i < obj.length; i++) {
                formData.append(key + `[${i}]`, obj[i])
            }
        } else {
            formData.append(key, obj);
        }
    });
    for (let item of formData.entries()) {
    }
    return formData;
}

document.querySelectorAll("input").forEach((item) => {
    item.addEventListener("change", (e) => {
        fetchFormData(e.target);
    })
})


async function paginatorAjax() {
    search.querySelectorAll('.pagination-item a').forEach(item => {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            page = e.target.getAttribute("href").split('page=')[1];
            ajax(page);
        });
    })
}

paginatorAjax();

async function ajax(page) {

    let formData = objectToFormData(data);

    let response = await fetch(`?page=${page}`, {
        method: "POST",
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf
        },
        body: formData
    });

    if (response.status === 422) {
        console.log(await response.json())
    } else if (response.status === 200) {
        search.innerHTML = await response.text();
        await paginatorAjax();
    } else if (response.status === 505) {
        alert("SOMETHING WENT WRONG!")
    }
}

form.addEventListener("submit", async function (e) {
    e.preventDefault();
    await ajax(page);
});


form.addEventListener('change', function () {
    if (data.kind_of_work_id.length > 0) {
        jobsButton.innerHTML = `Выбрано: ${data.kind_of_work_id.length}`;
    } else {
        jobsButton.innerHTML = buttonInnerHtml;
    }

    if (data.product_category_id.length > 0) {
        seriesButton.innerHTML = `Выбрано: ${data.product_category_id.length}`;
    } else {
        seriesButton.innerHTML = buttonInnerHtml;
    }

    if (data.color_id.length > 0) {
        let colorsToRemove = Object.keys(selectedColors).filter(color => !data.color_id.includes(color));

        colorsToRemove.forEach(color => {
            delete selectedColors[color];
        });

        data.color_id.forEach((el)=> {
            let labelElement = document.querySelector(`[for='C_${el}']`);
            let divElement = labelElement.querySelector('div');
            selectedColors[el] = window.getComputedStyle(divElement).getPropertyValue('background-color');
        });
        colorsButton.innerHTML = 'Выбрано: ';
        let countDivs = 0;
        for (let key in selectedColors) {
            if (countDivs >= 3) {
                let moreText = document.createTextNode('...');
                colorsButton.appendChild(moreText);
                break;
            }
            if (selectedColors.hasOwnProperty(key)) {
                let el = selectedColors[key];
                let colorPreview = document.createElement('div');
                colorPreview.style.background = el;
                colorPreview.style.width = '15px';
                colorPreview.style.height = '15px';
                colorPreview.style.marginRight = '5px';
                colorPreview.style.marginLeft = '5px';
                colorsButton.appendChild(colorPreview);
                countDivs++;
            }
        }
    } else {
        selectedColors = {};
        colorsButton.innerHTML = buttonInnerHtml;
    }
});

// TODO: Запросы на выборку
sortNumericButton.addEventListener('click',  () => {
   const buttonImages = sortNumericButton.querySelectorAll('.sort-button__image');
    buttonImages.forEach(image => {
        if (image.classList.contains('active-button')) {
            image.classList.remove('active-button');
        } else {
            image.classList.add('active-button');
        }
    });
});

sortAlphabeticButton.addEventListener('click', () => {
    const buttonImages = sortAlphabeticButton.querySelectorAll('.sort-button__image');
    buttonImages.forEach(image => {
        if (image.classList.contains('active-button')) {
            image.classList.remove('active-button');
        } else {
            image.classList.add('active-button');
        }
    });
});






