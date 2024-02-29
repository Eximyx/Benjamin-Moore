<section class="form-section">
    <iframe class="form-section__map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.4625306992025!2d23.828172970410048!3d53.67853919301063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dfd62f1aae4493%3A0x67ef838fce252f24!2z0J_Qu9C-0YjRh9CwINCh0LDQstC10YbQutCw0Y8!5e0!3m2!1sru!2sby!4v1705934120557!5m2!1sru!2sby"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <form class="form-section__form">
        <h4>@lang('main.form.title')</h4>
        <p>@lang('main.form.subTitle')</p>
        @csrf
        <label for="name">@lang('main.form.name')</label>
        <input type="text" id="name" placeholder="@lang('main.form.name')">
        <label for="email">@lang('main.form.email')</label>
        <input type="text" id="email" placeholder="Email" required>
        <label for="message">@lang('main.form.message')</label>
        <textarea id="message" placeholder="@lang('main.form.message')"></textarea>
        <button class="button-filled" type="submit">@lang('main.form.send')</button>
    </form>
</section>
