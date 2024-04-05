<li class="card">
    <div class="review-card">
        <div class="review-card__header">
            <img src="{{Vite::asset('resources/images/user-avatar.png')}}" alt="user avatar">
            <h4>{{$value->name}}</h4>
        </div>
        <p class="review-card__text">
            {{$value->description}}
        </p>
    </div>
</li>
