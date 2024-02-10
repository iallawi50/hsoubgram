<div class="card">
    <div class="card-header">
        <img src="{{ $post->owner->image }}" class="w-9 h-9 mr-3 rounded-full">
        <a href="{{ $post->owner->username }}" class="font-bold">{{ $post->owner->username }}</a>
    </div>

    <div class="card-body">
        <div class="max-h-[35rem] overflow-hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->description }}"
                class="h-auto w-full object-cover">
        </div>

        <div class="p-3">
            <a href="{{ $post->owner->username }}" class="font-bold ms-1">{{ $post->owner->username }}</a>
            <article class="inline-block">
                {{ $post->description }}
            </article>

            @if ($post->comments()->count())
                <a href="/p/{{ $post->slug }}">
                    <p class="p-3 font-bold text-sm text-gray-500">
                        {{ __('View all ' . $post->comments()->count() . ' comments') }}</p>
                </a>
            @endif

            <div class="p-3 text-gray-400 uppercase text-xs">
                {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
    </div>


    <div class="card-footer p-3 border border-t-2">
        <x-create-comment :post="$post" />
    </div>

</div>
