@extends('layouts.admin')
@section('contents')
        <a href="{{route('news.create')}} " class="btn btn-primary mb-3">Create new post</a>

    <div class="row">
        @foreach ($newsPosts->reverse() as $newsPost)
            <div style="padding: 0" class="col-lg-auto m-1">
                <div class="card" style="width: 18rem;">

                    <div class="card-body m-0 p-1">
                        <a href="{{route('news.show',$newsPost->slug)}}" style="" class="btn">
                            <img src="{{url('storage/image/'.$newsPost->main_image)}}" class="card-img-top m-0 mb-2"
                                 alt="...">
                        </a>
                        <h5 class="text-truncate m-0 p-0"
                            style="text-align: center">{{$newsPost->title}}</h5>
                        <div class="float-right">

                            <a href="{{route('news.edit',$newsPost->slug)}}" style="" class="btn btn-secondary mr-1"><i
                                    class="fas fa-pen"></i></a>
                            </button>
                            <form action="{{route('news.delete',$newsPost)}}" class="float-right" method="post">


                                @csrf
                                @method('delete')

                                <button type="submit" value="" class="btn btn-danger">
                                    <i class="fas fa-trash "></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="">
            <a href="{{route('news.create')}} " class="position-absolute btn btn-primary ">Create new post</a>

        </div>

    </div>
    <div id="paginator">
        {{$newsPosts->links()}}
    </div>

@endsection
