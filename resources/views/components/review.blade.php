<li class=" mb-2 rounded">
    <div class="flex w-full">
        <x-user-card :user="$review->author" />

        <div class="flex-1 items-between">
            <x-star-rating :rating="$review->rating"
                :string="\Carbon\Carbon::parse($review->created_at)->format('d M, Y')" :small="true" />
            <p>{{ $review->body }}</p>

            @if($review->image)
            <img src="{{ asset($review->image->path()) }}" alt="{{ $review->author->name }}" class="block w-full">
            @endif

            @if($review->reply)
            <div class="p-4 w-full mt-4 bg-gray-200">
                <span class="text-gray-600">Owner reply:</span>
                <p>{{  $review->reply->body }}</p>
            </div>
            @endif

            @can('reply', $review)
            <div class="mt-6 mt-5">
                <form action="/businesses/review/{{ $review->id }}/reply" method="POST">
                    <textarea name="body" rows="2" class="w-full border-2 p-2"></textarea>
                    <button type="submit" class="text-black-200">Add Reply</button>
                    @csrf
                </form>
            </div>
            @endcan
            <div class="reactions flex mt-5">
                @include('svgs.smile')
                @include('svgs.wink')
            </div>
        </div>
    </div>
</li>
