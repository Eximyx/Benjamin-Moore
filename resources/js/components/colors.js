const colorsWrapper = document.getElementsByClassName('colors-wrapper');

Array.from(colorsWrapper).forEach(wrapper => {
    const children = wrapper.children;

    Array.from(children).forEach(child => {
        let svg = child.querySelector('.svg-cart')
        let blockHeader = child.querySelector('.color-block__title');
        let blockId = child.querySelector('.color-block__id');
        let style = window.getComputedStyle(child).getPropertyValue('background-color');
        if(getColorBrightness(style)) {
            blockHeader.style.color = '#0e0e0e';
            blockId.style.color = '#0e0e0e';
        }

        child.addEventListener('mouseover', () => {
            svg.classList.remove("hidden");
        });

        child.addEventListener('mouseout', () => {
            svg.classList.add('hidden')
        });
    });
});

function rgbToHsl(r, g, b) {
    r /= 255; g /= 255; b /= 255;
    let max = Math.max(r, g, b), min = Math.min(r, g, b);
    let h, s, l = (max + min) / 2;

    if(max === min){
        h = s = 0; // achromatic
    } else {
        let d = max - min;
        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
        switch(max){
            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
            case g: h = (b - r) / d + 2; break;
            case b: h = (r - g) / d + 4; break;
        }
        h /= 6;
    }
    return [h, s, l];
}

function getColorBrightness(rgb) {
    // Извлекаем числа из строки RGB
    let match = rgb.match(/(\d+),\s*(\d+),\s*(\d+)/);
    if (match) {
        let r = parseInt(match[1]);
        let g = parseInt(match[2]);
        let b = parseInt(match[3]);

        // Переводим RGB в HSL
        let hsl = rgbToHsl(r, g, b);
        let l = hsl[2];  // Яркость в HSL

        // Определяем, является ли цвет светлым или темным
        return l > 0.6;
    } else {
        console.log('Неверный формат RGB');
    }
}



