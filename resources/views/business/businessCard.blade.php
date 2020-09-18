<a href="{{ $business->path() }}">
    <div class="business-cards">
        <div class="image-container">
            <img src="{{ asset($business->image()) }}" alt="{{ $business->title }}">
        </div>

        <div class="right-side ml-3 ">
            <h2 class="font-bold text-xl">{{ \Str::limit($business->name, 50) }}</h2>
            @foreach ($business->categories as $category)
            <span class="italic text-sm">{{ $category->name }} </span>
            @if(!$loop->last)
            /
            @endif
            @endforeach
            <x-star-rating :rating="$business->average_review" :small="true" :string="$business->reviewCount()" />
            <p>{{ \Str::limit($business->description, 120) }}</p>
        </div>
    </div>
</a>
