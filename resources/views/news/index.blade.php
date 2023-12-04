@extends('layouts.admin')
@section('contents')
    <div id="paginator">
        {{ $newsPosts->links() }}
    </div>
    <a href="{{ route('news.create') }} " class="btn btn-primary  mb-3">Create new post</a>
    <div>

        <div class="row row-gap-2 row-cols-md-auto">
            @foreach ($newsPosts->reverse() as $newsPost)
                <div class="column-gap-2 row-cols-lg-auto">
                    <div class="card" style="">
                        <div class="card-body">
                            <a href="{{ route('news.show', $newsPost->slug) }}" style="" class="btn">
                                <img src="{{ url('storage/image/' . $newsPost->main_image) }}"
                                     class="card-img-top img-thumbnail m-0 mb-2"
                                     style="border-width: 0" alt="...">
                            </a>
                            <h5 class="text-truncate m-0 p-0" style="text-align: center">
                                {{ $newsPost->title }}
                            </h5>
                            <div class="float-right align-self-lg-auto">
                                <a href="{{ route('news.edit', $newsPost->slug) }}" style=""
                                   class="btn btn-secondary mr-1"><i class="fas fa-pen"></i></a>
                                </a>
                                <form action="{{ route('news.delete', $newsPost) }}" class="float-right" method="post">
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
        </div>

    </div>
@endsection
