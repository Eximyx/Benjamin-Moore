@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
    <section class="news-section">
        <h2 class="section-title">@lang('news.title')</h2>
        <div class="news-section__wrapper">
            @foreach($data['newsPosts'] as $key => $value)
                @include('site.components.news-card')
            @endforeach
        </div>
        {{$data['newsPosts']->links('site.components.pagination')}}
    </section>
@endsection
