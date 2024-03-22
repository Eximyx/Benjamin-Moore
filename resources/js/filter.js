const accordion = document.querySelector('.mobile-filter__button')
const body = document.querySelector('.catalog-form')

accordion.addEventListener('click', () => {
    body.classList.toggle('active')
});

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


let fetchFormData = (element) => {
    if (element.name in data)
    {
        let id = element.id.split("_")[1];
        if (id !== undefined) {
            if (element.checked)
            {
                data[element.name].push(id);
            }
            else {
                let index = data[element.name].indexOf(id)
                data[element.name].splice(index, 1);
            }
        }
        else {
            console.log(data);
            data[element.name] = element.value;
        }
    }
    console.log(data);
};

let page = 1;

function objectToFormData(object){
    let formData = new FormData();
    Object.entries(object).forEach(([key, obj]) => {
        if (typeof obj === 'object' && obj != null)
        {
            for (let i = 0; i < obj.length; i++)
            {
                formData.append(key+`[${i}]`, obj[i])
            }
        }
        else {
            formData.append(key, obj);
        }
    });
    for (let item of formData.entries())
    {
        console.log(item[0], item[1])
    }
    return formData;
}

document.querySelectorAll("input").forEach((item)=> {
    item.addEventListener("change", (e) => {
        fetchFormData(e.target);
    })
})



async function paginatorAjax()
{
    search.querySelectorAll('.pagination-item a').forEach(item => {
        item.addEventListener("click", function(e) {
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
    }
    else if (response.status === 200) {
        search.innerHTML = await response.text();
        await paginatorAjax();
    }
    else if (response.status === 505) {
        alert("SOMETHING WENT WRONG!")
    }
}

form.addEventListener("submit", async function (e) {
    e.preventDefault();
    await ajax(page);
});


