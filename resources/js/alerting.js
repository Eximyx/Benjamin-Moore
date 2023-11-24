function openSubMenu() {
    if (document.querySelector('ul.sub-menu').style.display == "block") {
        document.querySelector('ul.sub-menu').style.display = "block"
        document.querySelector('li.menu-item-83').classList.add('open');
    }
    else {
        document.querySelector('li.menu-item-83').classList.remove('open');
        document.querySelector('ul.sub-menu').style.display = null;
    }
};
