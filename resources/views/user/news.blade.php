@extends('user.layout', ['title' => 'Каталог'])
@section('contents')
    <div id="news" class="row justify-content-between m-0 p-0 border-bottom border-2 border-opacity-25 mt-5">
        <div class="col-sm-12 m-0 p-0 row">
            <h4 class="fw-normal">Новости</h4>
            <h2 class="text-danger text-nowrap fw-medium mb-2">ПОСЛЕДНИЕ НОВОСТИ</h2>
        </div>
        @foreach ($newsposts as $item)
            <div id="news-{{ $item->id }}" class="col-sm-12 col-md-4 justify-content-between align-items-end">
                <img class="img-fluid w-100" srcset="{{ url('storage/image') }}/{{ $item->main_image }}">
                <div class="row justify-content-between">
                    <p class="text-truncate col-6 opacity-75 m-0 my-2 ">
                        <i class="fa fa-clock opacity-75 "></i>
                        {{ $item->created_at }}
                    </p>
                    <p class="text-truncate col-6 opacity-75 m-0 my-2 text-center">
                        <a class="link-secondary" href="{{route('user.news.show',$item->slug)}}">Подробнее</a>
                    </p>
                </div>
                <h4 class="col text-wrap truncate">{{ $item->title }}</h4>
                <p class="text-wrap truncate">{{ $item->content }}</p>
            </div>
        @endforeach
        {{ $newsposts->links() }}
    </div>
@endsection
