 <div class="flex items-start" style="width: 35% !important;">
     <img src="https://www.gravatar.com/avatar/{{ $user->email }}?s=60" width="60" class="rounded"
         alt="{{$user->name }}">
     <div class="ml-2">
         <h5><strong>{{ $user->name }}</strong></h5>
         <p class="mb-1">{{ $user->country }}, {{ $user->city }}</p>
         <p class="text-xs flex items-center "><img src="{{ asset('images/thumbs-up.svg') }}" alt="review icon"
                 class="mr-1">{{ $user->review_count }}
             Reviews</p>
         <p class=" text-xs flex items-center">
             <img src="{{ asset('images/review-icon.svg') }}" alt="review icon" class="mr-1">{{ $user->average_rating }}
             Avg. Rating
         </p>
     </div>
 </div>
