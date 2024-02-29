<div class="breadcrumbs">
    <a href="{{route('user.main.index')}}">@lang('nav-links.main')</a>
    <img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow">
    <a href="{{request()->getUri()}}"><b>{{trans('breadcrumbs.'.Route::getCurrentRoute()->getName())}}</b></a>
</div>
