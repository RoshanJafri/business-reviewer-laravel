<template>
    <li class=" mb-2 rounded">
        <div class="flex w-full">
            <!-- <x-user-card :user="$review->author" /> -->
            <UserCard :author="review.author" />
            <div class="flex-1 items-between">
                <div class="flex justify-between">
                    <StarRating
                        :rating="review.rating"
                        :createdAt="review.created_at"
                        :small="true"
                    />

                    <p v-if="review.showcased">I have been showcased</p>
                </div>
                <p>{{ review.body }}</p>

                <!-- @if($review->image)
                <img
                    src="{{ asset($review->image->path()) }}"
                    alt="{{ $review->author->name }}"
                    class="block w-full"
                />
                @endif  -->
                <!-- @if($review->reply)
                <div class="p-4 w-full mt-4 bg-gray-200">
                    <span class="text-gray-600">Owner reply:</span>
                    <p>{{  $review->reply->body }}</p>
                </div>
                @endif @can('reply', $review)
                <div class="mt-6 mt-5">
                    <form
                        action="/businesses/review/{{ $review->id }}/reply"
                        method="POST"
                    >
                        <textarea
                            name="body"
                            rows="2"
                            class="w-full border-2 p-2"
                        ></textarea>
                        <button type="submit" class="text-black-200">
                            Add Reply
                        </button>
                        @csrf
                    </form>
                </div>
                @endcan -->
                <!-- <div class="flex justify-between mt-5">
                    <div class="reactions flex">
                        @include('svgs.smile') @include('svgs.wink')
                    </div>
                    @can('update', $business) @if($review->showcased)
                    <form
                        action="{{ route('reviews.showcase', $review->id) }}"
                        method="POST"
                    >
                        @method('DELETE') @csrf
                        <button type="submit">Remove Showcase</button>
                    </form>
                    @else
                    <form
                        action="{{ route('reviews.showcase', $review->id) }}"
                        method="POST"
                    >
                        @csrf
                        <button type="submit">Showcase</button>
                    </form>
                    @endif @endcan
                </div> -->
                <!-- </div> -->
            </div>
        </div>
        <hr class="my-5" />
    </li>
</template>

<script>
import StarRating from "../StarRating.vue";
import UserCard from "./UserCard.vue";

export default {
    components: {
        StarRating,
        UserCard
    },
    props: {
        review: {
            type: Object,
            required: true
        }
    }
};
</script>

<style></style>
