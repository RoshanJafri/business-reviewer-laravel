 <div class="stars-container flex items-center my-3">
     @for ($i = 0; $i < $rating; $i++) <img src="{{ asset('images/star-full.svg') }}"
         class="rating-stars {{ $small ? 'stars-small' : ''}}" alt="Full star rating">
         @endfor

         @for ($i = 0; $i < (5 - $rating); $i++) <img src="{{ asset('images/star-empty.svg') }}" alt="Empty star rating"
             class="rating-stars {{ $small ? 'stars-small' : '' }}">
             @endfor
             <span class="{{ $small ? 'text-sm' : 'text-md' }}">{{ $string }}</span>
 </div>
