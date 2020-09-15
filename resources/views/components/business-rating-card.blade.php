 <div class="card mt-4">
     {{-- {{ dd($ratingsArray) }} --}}
     <ul class="py-4 review-ratings">
         <li>
             <div style="width: {{ $ratingsArray[5][1] }}%">5</div> {{ $ratingsArray[5][0] }}
         </li>
         <li>
             <div style="width: {{ $ratingsArray[4][1] }}%">4</div> {{ $ratingsArray[4][0] }}
         </li>
         <li>
             <div style="width: {{ $ratingsArray[3][1] }}%">3</div> {{ $ratingsArray[3][0] }}
         </li>
         <li>
             <div style="width: {{ $ratingsArray[2][1] }}%">2</div> {{ $ratingsArray[2][0] }}
         </li>
         <li>
             <div style="width: {{ $ratingsArray[1][1] ?: 0}}%">1</div>{{ $ratingsArray[1][0] }}
         </li>
     </ul>
 </div>
