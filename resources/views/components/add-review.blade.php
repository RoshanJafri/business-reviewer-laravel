@can('addReview', $business)
<div class="mt-5" id="add-review">
    @auth
    <div class="py-4">
        <div class=" mt-2 flex">

            <x-user-card />
            <div class="w-full flex-1">
                <form action="/businesses/{{$business->slug }}/review" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="mb-3">
                        <input type="file" name="image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <select name="rating" class="block border-2 border-gray-200 rounded">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>


                    <textarea name="body" id="" rows="5"
                        class="block w-full border-2 border-gray-300 rounded"></textarea>
                    @error('body')
                    <p class="text-sm text-red-400">Please provide text when reviewing!</p>
                    @enderror

                    @error('rating')
                    <p class="text-sm text-red-400">Please provide text when reviewing!</p>
                    @enderror

                    <button type="submit" class="bg-red-500 button text-white ml-auto mt-3">Submit Review</button>
                </form>
            </div>


        </div>
    </div>
    @else
    <p class="py-3">Sign in To Review This Business...</p>
    @endauth

</div>
@endcan
