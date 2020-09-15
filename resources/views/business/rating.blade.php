<div class="my-3 flex align-center">
    @if($rating > 0)
    @for ($i = 0; $i < $rating; $i++) <img src="{{ asset('images/rating-star.svg') }}" width="25" alt="rating">
        @endfor
        ({{$rating}})
        @else
        ({{$rating}})
        @endif
</div>
