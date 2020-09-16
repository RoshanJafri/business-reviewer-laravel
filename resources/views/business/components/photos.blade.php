<div class="guest-photos grid gap-3 grid-cols-2 mb-8">
    <a href="#" class="button all-photos">View All</a>
    @forelse ($business->images as $image)
    <div class="guest-photo"> <img src="{{ asset($image->path()) }}" alt="{{ $business->name }}"></div>
    @empty
    <p>No user provided images yet.</p>
    @endforelse
</div>
