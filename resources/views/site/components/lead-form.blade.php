<form action="javascript:void(0)" id="leadsForm" class="form-section__form" method="POST"
      enctype="multipart/form-data">
    @csrf
    <h4>@lang('main.form.title')</h4>
    <p>@lang('main.form.subTitle')</p>
    @csrf
    @include('site.components.error-alert')
    @include('site.components.success-alert')
    <label for="name">@lang('main.form.name')</label>
    <input type="text" name="name" id="name" placeholder="@lang('main.form.name')">
    <label for="contact_info">@lang('main.form.email')</label>
    <input type="text" name="contact_info" id="contact_info" placeholder="Contact information" required>
    <label for="message">@lang('main.form.message')</label>
    <textarea name="message" id="message" placeholder="@lang('main.form.message')"></textarea>
    <button class="button-filled" type="submit">@lang('main.form.send')</button>
</form>
@push('scripts')
    @vite('resources/js/lead-form.js')
@endpush
