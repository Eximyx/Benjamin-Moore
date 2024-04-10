let checkedCheckboxes = []; // Буферная переменная

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.dropdown_with-chk-admin').forEach(function (selectWrapper) {
        const dropdownBtn = selectWrapper.querySelector('.dropdown_with-chk__button');
        const dropdownList = selectWrapper.querySelector('.dropdown_with-chk__list');
        const dropdownItemsAdmin = dropdownList.querySelectorAll('.dropdown_with-chk__list-item');

        dropdownBtn.addEventListener('click', function () {
            dropdownList.classList.toggle('dropdown_with-chk__list_visible');
            this.classList.toggle('dropdown_with-chk__button_active');
        });

        dropdownItemsAdmin.forEach(function (listItem) {
            listItem.addEventListener('click', function (e) {
                e.target.classList.toggle('dropdown_with-chk__list-item_active');
            })
        });

        document.addEventListener('click', function (e) {
            if (e.target !== dropdownBtn && e.target !== dropdownItemsAdmin && !e.target.classList.contains('dropdown_with-chk__list-item') && !e.target.classList.contains('dropdown_with-chk__list-item_label')) {
                dropdownBtn.classList.remove('dropdown_with-chk__button_active');
                dropdownList.classList.remove('dropdown_with-chk__list_visible');
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Tab' || e.key === 'Escape') {
                dropdownBtn.classList.remove('dropdown_with-chk__button_active');
                dropdownList.classList.remove('dropdown_with-chk__list_visible');
            }
        });

        let checkboxes = dropdownList.querySelectorAll('input[type="checkbox"]');
        let counter = 0;
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    checkedCheckboxes.push(this.id); // Добавление идентификатора чекбокса в буферную переменную
                } else {
                    checkedCheckboxes = checkedCheckboxes.filter(item => item !== this.id); // Удаление идентификатора чекбокса из буферной переменной
                }

                const colorsPreviewBlock = document.getElementById('color_boxes_row');
                colorsPreviewBlock.innerHTML = ''; // Очистить блок перед добавлением

                checkedCheckboxes.slice(0, 3).forEach((key, index) => { // Используем slice для ограничения до 3 цветовых предпросмотров
                    let previewColor = document.getElementById(`preview_${key}`);
                    const computedStyle = window.getComputedStyle(previewColor);
                    const elementBgColor = computedStyle.backgroundColor;
                    let colorPreviewDiv = document.createElement('div');
                    colorPreviewDiv.style.background = elementBgColor;
                    colorPreviewDiv.style.width = '10px';
                    colorPreviewDiv.style.height = '100%';
                    colorPreviewDiv.style.marginRight = '5px';
                    colorPreviewDiv.style.marginLeft = '5px';
                    colorPreviewDiv.style.border = '1px solid #cacaca';
                    colorsPreviewBlock.appendChild(colorPreviewDiv);
                    counter++;
                });

                if (counter >= 3 && checkedCheckboxes.length > 3) {
                    let moreText = document.createTextNode('...');
                    colorsPreviewBlock.appendChild(moreText);
                }
            });
        });
    });

    const colorInput = document.querySelector('.color-input');
    const colorPickerButton = document.querySelector('.color-picker__button');

    if(colorPickerButton){
        colorPickerButton.addEventListener('click', function (){
            colorInput.click();
        });
    }

    if(colorInput){
        colorInput.addEventListener('change', function (){
            colorPickerButton.textContent = 'Selected color: ';
            const colorPreviewBorder = document.createElement('div');
            colorPreviewBorder.className = 'color-picker__preview-border';
            colorPickerButton.appendChild(colorPreviewBorder);
            const colorPickerPreview = document.createElement('div');
            colorPickerPreview.className = 'color-picker__preview';
            colorPickerPreview.style.backgroundColor = colorInput.value;
            colorPreviewBorder.appendChild(colorPickerPreview);
        });
    }
});




