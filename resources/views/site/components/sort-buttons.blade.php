<div class="sort-buttons__group">
    <p>Сортировка:</p>
    <button type="button" class="sort-button" id="sortAlphabeticButton">
        <img class="sort-button__image active-button" src="{{Vite::asset('resources/icons/SortAlphaUpAlt.svg')}}" alt="В алфавитном">
        <img class="sort-button__image" src="{{Vite::asset('resources/icons/SortAlphaUp.svg')}}" alt="В обратном алфавитном">
        Название
    </button>
    <button type="button" class="sort-button" id="sortNumericButton">
        <img class="sort-button__image active-button" src="{{Vite::asset('resources/icons/SortNumericDown.svg')}}" alt="По возрастанию">
        <img class="sort-button__image" src="{{Vite::asset('resources/icons/SortNumericDownAlt.svg')}}" alt="По убыванию">
        Цена
    </button>
</div>
