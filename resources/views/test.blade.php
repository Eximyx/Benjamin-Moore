{{--{{dd($resource->resource['news'][3]/*)*/}}--}}
{{--

//News
<table>
    <tr>
        <th>id</th>
        <th>title</th>
    </tr>
    @foreach($data->resource['news'] as $slideIndex => $slide)
        @foreach($slide as $cardIndex => $card)
            <tr>
                <th>{{$card->id}}</th>
                <th>{{$card->title}}</th>
            </tr>
        @endforeach
    @endforeach
</table>
//Products
<table>
    <tr>
        <th>id</th>
        <th>title</th>
    </tr>
    @foreach($data->resource['products'] as $slides)
        @foreach($slides as $cardIndex => $card)
            <tr>
                <th>{{$card->id}}</th>
                <th>{{$card->title}}</th>
            </tr>
        @endforeach
        <tr>
            <th>SLIDE {{$loop->index}}</th>
        </tr>
    @endforeach
</table>


//Reviews
<table>
    <tr>
        <th>id</th>
        <th>title</th>
    </tr>
    @foreach($data->resource['reviews'] as $slides)
        @foreach($slides as $cardIndex => $card)
            <tr>
                <th>{{$card->id}}</th>
                <th>{{$card->name}}</th>
            </tr>
        @endforeach
        <tr>
            <th>SLIDE {{$loop->index}}</th>
        </tr>
    @endforeach
</table>


//Banners
<table>
    <tr>
        <th>id</th>
        <th>title</th>
    </tr>
    @foreach($data->resource['banners'] as $slides)
        <tr>
            <th>{{$slides->id}}</th>
            <th>{{$slides->title}}</th>
        </tr>
    @endforeach
</table>

//Sections
<table>
    <tr>
        <th>id</th>
        <th>title</th>
    </tr>
    @foreach($data->resource['sections'] as $slides)
        <tr>
            <th>{{$slides->id}}</th>
            <th>{{$slides->title}}</th>
        </tr>
    @endforeach
</table>
// Settings
{{$data->resource['settings']->resource->id}}
<br>
{{$data->resource['settings']->resource->email}}
<br>
{{$data->resource['settings']->resource->phone}}
<br>
{{$data->resource['settings']->resource->work_time}}
<br>
{{$data->resource['settings']->resource->location}}
<br>
{{$data->resource['settings']->resource->instagram}}
<br>
{{$data->resource['settings']->resource->description}}
<br>
--}}


{{dd($data)}}
