<div id="{{ $review->id }}"
     class="{{ $review->id % 4 == 0 ? 'd-none d-lg-block' : '' }} h-auto review row justify-content-left align-items-left col-md-4 col-lg-4 py-2 m-0 p-2">
    <div class="row border-2 border rounded-4 align-items-center m-0 p-0">

        <div class="row align-items-left m-0 p-0">
            <img class="img-profile rounded-circle m-0 p-0"
                 src="{{ url('storage/image/' . 'profile.svg') }}"
                 alt="">
            <div class="text-left fs-5 p-0 m-0">
                <p class="m-0 p-0">{{ $review->title }}</p>
            </div>
        </div>
        <div class="text-center fw-light fs-6 p-0 m-0">
            <p class="m-0 p-0">{{ $review->description }}</p>
        </div>
        <div class="row justify-content-between align-items-center m-0 py-1">
            <div class="col-5 col-sm-5 col-md-6 col-lg-6 align-items-center m-0 p-0">
                <a class="btn btn-danger text-center p-0 m-0 w-100 h-25 py-1 rounded-4 fs-5"
                   href="{{ route('user.catalog') }}">@lang('main.buttons.order')</a>
            </div>
        </div>
    </div>
</div>
