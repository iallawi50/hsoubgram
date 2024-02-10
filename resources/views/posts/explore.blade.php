<x-app-layout>


    <div class="grid grid-cols-3 gap-1 md:gap-5 mt-8">

        @foreach ($posts as $post)
            <div>
                <a href="/p/{{ $post->slug }}" class="">
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full aspect-square objecet-cover"
                        alt="">
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-5">
        {{ $posts->links() }}
    </div>


</x-app-layout>
