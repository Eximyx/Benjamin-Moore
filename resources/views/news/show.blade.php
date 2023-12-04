@extends('layouts.admin')
@section('contents')

    <h1>Новости</h1>
    <div class="col">
        <div class="row-lg-6 mb-4">

            <div class=" m-0 text-white text-truncate rounded"
                 style="background-repeat: no-repeat;background-image: url({{url('storage/image/'.$newsPost->main_image)}})">
                <p style="white-space: normal" class="m-0 text-black font-weight-bold">
                    {{$newsPost->title}}
                </p>
            </div>
        </div>

        <div class="col-lg-6 mb-4" id='content'>
            {!! $newsPost->content !!}
        </div>
        <div class="row-lg-6 mb-4">
            <a href="{{route('news.edit',$newsPost->slug)}}" class="btn btn-primary row-lg-6 mb-4">
                Edit
            </a>

            <a href="{{route('news.index')}}" class="btn btn-primary row-lg-6 mb-4">
                Back
            </a>
           <div>
            <form action="{{route('news.delete',$newsPost)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
           </div>
        </div>
    </div>
x

@endsection
