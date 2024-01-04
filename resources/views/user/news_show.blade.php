@extends('user.layout', ['title' => 'Каталог'])
@section('contents')
    <div id="news" class="row justify-content-between m-0 p-0 border-bottom border-2 border-opacity-25 mt-5">
        <div class="col-sm-12 col-lg-8">
            <h2 class="text-wrap">
                {{ $NewsPost->title }}

            </h2>
            <p class="text-truncate col-6 opacity-75 m-0 my-2 ">
                <i class="fa fa-clock opacity-75 "></i>
                {{ $NewsPost->created_at }}
            </p>

            <img class="img-fluid rounded-4 mt-4" src="{{ url('storage/assets/creative.jpg') }}" alt="">
            <div class="mt-4">
                {{ $NewsPost->content }}
            </div>
        </div>
        <div class="col-sm-12 col-lg-4 text-wrap mt-sm-5 m-0 p-5">
            <h2 class="text-center">Последние новости</h2>
            @foreach ($NewsPosts as $item)
                <div id="news-{{ $item->id }}"
                    class="mx-auto col-sm-12 col-lg-11 justify-content-between align-items-end">
                    <img class="img-fluid w-100" srcset="{{ url('storage/image') }}/{{ $item->main_image }}">
                    <div class="row justify-content-between">
                        <p class="text-truncate col-6 opacity-75 m-0 my-2 ">
                            <i class="fa fa-clock opacity-75 "></i>
                            {{ $NewsPost->created_at }}
                        </p>
                        <p class="text-truncate col-6 opacity-75 m-0 my-2 text-center">
                            <a class="link-secondary" href="{{route('user.news.show',$NewsPost->slug)}}">Подробнее</a>
                        </p>
                    </div>
                    <h4 class="col text-wrap truncate">{{ $item->title }}</h4>
                    <p class="text-wrap truncate">{{ $item->content }}</p>
                </div>
            @endforeach
            <div class="row justify-content-center">
                <a class="w-auto btn btn-outline-danger" href="{{route('user.news')}}">Все новости</a>
            </div>
        </div>
    </div>
@endsection
