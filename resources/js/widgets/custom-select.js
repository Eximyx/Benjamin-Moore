document.querySelectorAll('.dropdown_with-chk').forEach(function (dropdownWrapper) {
    const dropdownBtn = dropdownWrapper.querySelector('.dropdown_with-chk__button');
    const dropdownList = dropdownWrapper.querySelector('.dropdown_with-chk__list');
    const dropdownItems = dropdownList.querySelectorAll('.dropdown_with-chk__list-item');

    dropdownBtn.addEventListener('click', function () {
        dropdownList.classList.toggle('dropdown_with-chk__list_visible');
        this.classList.toggle('dropdown_with-chk__button_active');
    });

    dropdownItems.forEach(function(listItem) {
        listItem.addEventListener('click', function (e) {
            e.target.classList.toggle('dropdown_with-chk__list-item_active');
        })
    })

    document.addEventListener('click', function (e) {
        if ( e.target !== dropdownBtn && e.target !== dropdownItems && !e.target.classList.contains('dropdown_with-chk__list-item') && !e.target.classList.contains('dropdown_with-chk__list-item_label')){
            dropdownBtn.classList.remove('dropdown_with-chk__button_active');
            dropdownList.classList.remove('dropdown_with-chk__list_visible');
        }
    })

    document.addEventListener('keydown', function (e) {
        if( e.key === 'Tab' || e.key === 'Escape' ) {
            dropdownBtn.classList.remove('dropdown_with-chk__button_active');
            dropdownList.classList.remove('dropdown_with-chk__list_visible');
        }
    })
})