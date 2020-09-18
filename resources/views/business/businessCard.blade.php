<div
    class="flex p-4 business-cards rounded overflow-hidden rounded border-gray-400 border border-solid hover:bg-gray-100">

    <div class="image-container">
        <img src="{{ asset($business->image()) }}" alt="{{ $business->title }}">
    </div>


    <div class="px-5 p-2 leading-normal">

        <div class="text-gray-900 font-bold text-xl mb-2 flex items-center justify-between"><a
                href="{{ $business->path() }}">{{ $business->name }}</a>
            <x-star-rating :rating="$business->average_review" :small="true" />
        </div>

        <ul>
            @foreach ($business->categories as $category)
            <li class="inline text-sm"><a href="#" class="text-gray-600">{{!$loop->first ? '/ ' : ''  }}
                    {{ $category->name }}</a>
            </li>
            @endforeach
        </ul>

        <p>{{ \Str::limit($business->description, 250) }}</p>

    </div>
</div>
