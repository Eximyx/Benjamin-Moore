@extends('layouts.admin')
@section('contents')
        <a href="{{route('news.create')}} " class="btn btn-primary mb-3">Create new post</a>
        <div class="row">
            @foreach ($newsPosts->reverse() as $newsPost)
                <div class="card" style="width: 18rem;">
                    <a class="btn stretched-link" href="{{route('news.show',$newsPost->slug)}}">
                        <img class="card-img-top" src="{{url('storage/image/'.$newsPost->main_image)}}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$newsPost->title}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
@endsection
