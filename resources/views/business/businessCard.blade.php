<div class="max-w-sm w-full lg:max-w-full lg:flex my-2" style="height: 250px;">

    <div class="block w-full md:w-1/3" style="height: 100%;"> <img src="{{ asset($business->image()) }}"
            alt="{{ $business->title }}" style="height: 100%; width: 100%; object-fit: cover;">
    </div>


    <div class="border-r  w-full md:w-2/3 border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white
        rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-gray-900 font-bold text-xl mb-2"><a
                    href="{{ $business->path() }}">{{ $business->name }}</a></div>
            <ul>
                @foreach ($business->categories as $category)
                <li class="inline"><a href="#" class="text-gray-600">{{!$loop->first ? '/ ' : ''  }}
                        {{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
            <p class="text-gray-700 text-base mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
        </div>
        <x-star-rating :small="true" :rating="$business->average_review"
            :string="$business->reviews->count() . ' Reviews'" />
    </div>


</div>
