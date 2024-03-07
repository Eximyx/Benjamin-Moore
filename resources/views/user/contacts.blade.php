@extends('user.layout')
@section('contents')
    <div class="row justify-content-between">
        <div class="row">
            <div class="col-12 col-md-4 fw-light fs-3">
                <h1>
                    @lang('findStore.contacts')
                </h1>
                <div id="contacts">
                    <p><i class="text-danger fa fa-phone"></i> +375(29) 608-40-00</p>
                    <p><i class="text-danger fa fa-map-marker-alt"></i> г. Минск ул. Восточная 41</p>
                    <p><i class="text-danger fa fa-envelope"></i> +375(29) 608-40-00</p>
                    <p><i class="text-danger fa fa-instagram"></i> @benjaminmoore.by</p>
                </div>
                <p class="fw-normal">@lang('findStore.partners')</p>
                <div class="">
                    <p><i class="text-danger fa fa-map-marker-alt"></i> г. Могилёв "HouseMaster"</p>
                </div>
                <div class="">
                    <p><i class="text-danger fa fa-map-marker-alt"></i> г. Гродно "LuxDecor"</p>
                </div>
            </div>
            <div class="d-none d-md-flex col-8 h-100">
                <iframe class="rounded-4 mb-3"
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab4b0cc562e37a8f254c72d9ee28e7f7d677f827665373280c0df05bc6f3a013a&amp;source=constructor"
                        width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </div>

        <div id="leads" class="row m-0 p-0 mt-5">
            <div class="d-none d-md-flex  col-sm-12 col-md-12 col-lg-8 m-0 p-0">
                <iframe class="rounded-left-4 mb-3 m-0 p-0 w-100 h-100"
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab4b0cc562e37a8f254c72d9ee28e7f7d677f827665373280c0df05bc6f3a013a&amp;source=constructor"
                        frameborder="0"></iframe>
            </div>
            <div class="row col m-0 p-0 py-4" style="background-color:#F5E9DD">
                <form action="javascript:void(0)" id="Form" name="Form" method="POST" class="form-horizontal"
                      enctype="multipart/form-data">
                    <h3 class="fw-normal fs-3">@lang('findStore.form.title')</h3>
                    <h2 class="text-wrap fw-normal fs-5 mb-2">@lang('findStore.form.subTitle')</h2>
                    <input type="hidden" name="id" id="id">

                    <div class="col-12 justify-content-between align-items-center">
                        <label class="form-label p-0">@lang('findStore.form.name')</label>
                        <input type="text" class="form-control rounded-5 border-danger border-2" id="name"
                               name="name" placeholder=@lang('findStore.form.name')>
                    </div>
                    <div class="col-12 justify-content-between align-items-center">
                        <label class="form-label p-0">@lang('findStore.form.email')</label>
                        <input type="email" class="form-control rounded-5 border-danger border-2" id="contact_info"
                               name="contact_info" placeholder=@lang('findStore.form.email')>
                    </div>
                    <div class="col-12 justify-content-between align-items-center">
                        <label for="exampleFormControlTextarea1"
                               class="form-label p-0">@lang('findStore.form.message')</label>
                        <textarea class="form-control rounded-4 border-danger border-2" id="message" name="message"
                                  rows="6"
                                  placeholder=@lang('findStore.form.message')></textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit"
                                class="w-auto px-5 btn btn-danger text-center rounded-4 fs-4">@lang('findStore.form.order')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
