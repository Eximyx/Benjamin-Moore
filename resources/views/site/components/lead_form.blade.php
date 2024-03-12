<section class="form-section">
    <iframe class="form-section__map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.4625306992025!2d23.828172970410048!3d53.67853919301063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dfd62f1aae4493%3A0x67ef838fce252f24!2z0J_Qu9C-0YjRh9CwINCh0LDQstC10YbQutCw0Y8!5e0!3m2!1sru!2sby!4v1705934120557!5m2!1sru!2sby"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <form action="javascript:void(0)" class="form-section__form" method="POST" enctype="multipart/form-data">
        @csrf
        <h4>@lang('main.form.title')</h4>
        <p>@lang('main.form.subTitle')</p>
        @csrf
        <label for="name">@lang('main.form.name')</label>
        <input type="text" name="name" id="name" placeholder="@lang('main.form.name')">
        <label for="contact_info">@lang('main.form.email')</label>
        <input type="text" name="contact_info" id="contact_info" placeholder="Contact information" required>
        <label for="message">@lang('main.form.message')</label>
        <textarea name="message" id="message" placeholder="@lang('main.form.message')"></textarea>
        <button class="button-filled" type="submit">@lang('main.form.send')</button>
    </form>
    {{--      <form action="javascript:void(0)" id="Form" name="Form" method="POST" class="form-horizontal"
                enctype="multipart/form-data">
              <h3 class="fw-normal fs-3">@lang('main.form.title')</h3>
              <h2 class="text-wrap fw-normal fs-5 mb-2">@lang('main.form.subTitle')</h2>
              <input type="hidden" name="id" id="id">

                  <label class="form-label p-0">@lang('main.form.name')</label>
                  <input type="text" class="form-control rounded-5 border-danger border-2" id="name"
                         name="name" placeholder=@lang('main.form.name')>
                  <label class="form-label p-0">@lang('main.form.email')</label>
                  <input type="email" class="form-control rounded-5 border-danger border-2" id="contact_info"
                         name="contact_info" placeholder=@lang('main.form.email')>
                  <label for="exampleFormControlTextarea1" class="form-label p-0">@lang('main.form.message')</label>
                  <textarea class="form-control rounded-4 border-danger border-2" id="message" name="message" rows="6"
                            placeholder=@lang('main.form.message')></textarea>
                  <button type="submit"
                          class="w-auto px-5 btn btn-danger text-center rounded-4 fs-4">@lang('main.form.order')
                  </button>
          </form>--}}
</section>

{{-- TODO FRONT: 5. Сделать AJAX запрос в эту же форму и тут лушче использовать formdata, чтобы в юрл не уходили параметры --}}
