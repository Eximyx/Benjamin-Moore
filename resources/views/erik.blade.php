@extends('layouts.admin')
@section('contents')
<form class="catalog-form">
    <label class="form-label" for="series">Серия</label>
    <div class="dropdown_with-chk">
        <button type="button" class="dropdown_with-chk__button">Выберите из списка</button>
        <ul class="dropdown_with-chk__list" id="product_category_id">
            <li class="dropdown_with-chk__list-item">
                <input type="color" name="colorPicker" id="colorPicker" class="dropdown_with-chk__list-item_label">
                <label for="i-1" class="dropdown_with-chk__list-item_label">Aura</label>
            </li>
            <li class="dropdown_with-chk__list-item">
                <input type="checkbox" name="i-2" id="i-2" class="dropdown_with-chk__list-item_label">
                <label for="i-2" class="dropdown_with-chk__list-item_label">Shmaura</label>
            </li>
            <li class="dropdown_with-chk__list-item">
                <input type="checkbox" name="i-3" id="i-3" class="dropdown_with-chk__list-item_label">
                <label for="i-3" class="dropdown_with-chk__list-item_label">Maura</label>
            </li>
            <li class="dropdown_with-chk__list-item">
                <input type="checkbox" name="i-4" id="i-4" class="dropdown_with-chk__list-item_label">
                <label for="i-4" class="dropdown_with-chk__list-item_label">neAura</label>
            </li>
        </ul>
    </div>
{{--    <label class="form-label" for="jobs">Работы</label>--}}
{{--    <div class="dropdown_with-chk">--}}
{{--        <button type="button" class="dropdown_with-chk__button">Выберите из списка</button>--}}
{{--        <ul class="dropdown_with-chk__list" id="jobs">--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-1-1" id="i-1-1" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-1-1" class="dropdown_with-chk__list-item_label">Aura</label>--}}
{{--            </li>--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-2-1" id="i-2-1" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-2-1" class="dropdown_with-chk__list-item_label">Shmaura</label>--}}
{{--            </li>--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-3-1" id="i-3-1" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-3-1" class="dropdown_with-chk__list-item_label">Maura</label>--}}
{{--            </li>--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-4-1" id="i-4-1" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-4-1" class="dropdown_with-chk__list-item_label">neAura</label>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <label class="form-label" for="colors">Цвета</label>--}}
{{--    <div class="dropdown_with-chk">--}}
{{--        <button type="button" class="dropdown_with-chk__button">Выберите из списка</button>--}}
{{--        <ul class="dropdown_with-chk__list" id="colors">--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-1-2" id="i-1-2" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-1-2" class="dropdown_with-chk__list-item_label">Aura</label>--}}
{{--            </li>--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-2-2" id="i-2-2" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-2-2" class="dropdown_with-chk__list-item_label">Shmaura</label>--}}
{{--            </li>--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-3-2" id="i-3-2" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-3-2" class="dropdown_with-chk__list-item_label">Maura</label>--}}
{{--            </li>--}}
{{--            <li class="dropdown_with-chk__list-item">--}}
{{--                <input type="checkbox" name="i-4-2" id="i-4-2" class="dropdown_with-chk__list-item_label">--}}
{{--                <label for="i-4-2" class="dropdown_with-chk__list-item_label">neAura</label>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <label class="form-label" for="budget">Бюджет</label>--}}
{{--    <div class="catalog-form__budget-block" id="budget">--}}
{{--        <input type="text" class="form-input" placeholder="От">--}}
{{--        <p>-</p>--}}
{{--        <input type="text" class="form-input" placeholder="До">--}}
{{--    </div>--}}
    <div class="form-buttons">
        <button type = "submit" onclick="square()" class="button-outlined form-button">Применить фильтр</button>
        <button class="button-filled form-button">Cбросить всё</button>
    </div>
</form>

<script>
    function square(number) {
        const colorPicker = document.getElementById('colorPicker');
        const hexColor = colorPicker.value;
        console.log(hexColor);
    }

</script>
@endsection
