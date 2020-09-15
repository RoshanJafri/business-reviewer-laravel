 <ul class="mt-5">
     @forelse ($business->reviews as $review)
     <x-review :review="$review" :business="$business" />
     <hr class="my-5">
     @empty
     <p class="text-gray-600">No reviews yet...</p>
     @endforelse
 </ul>
