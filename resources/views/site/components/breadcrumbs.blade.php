@hasSection('breadcrumbs')
    @php
        $uri = explode("/", request()->getUri());
        $path = $uri[count($uri)-2];
    @endphp
@endif
<div class="breadcrumbs">
    <a href="{{route('user.main.index')}}">@lang('nav-links.main')</a>
    <img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow">
    @hasSection('breadcrumbs')
        <a href="{{route('user.'.$path.'.index')}}">@lang('nav-links.'.$path)</a>
        <img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow">
        <a href="{{request()->getUri()}}"><b>@yield('breadcrumbs')</b></a>
    @else
        <a href="{{request()->getUri()}}"><b>{{trans('breadcrumbs.'.Route::getCurrentRoute()->getName())}}</b></a>
    @endif
</div>
