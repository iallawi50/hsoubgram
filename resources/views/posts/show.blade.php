<x-app-layout>

    <div class="h-screen md:flex md:flex-row">

        {{-- left side --}}
        <div class="h-full md:w-7/12 bg-black flex items-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->description }}"
                class="max-h-screen object-cover mx-auto">
        </div>


        {{-- Right Side --}}

        <div class="flex w-full flex-col bg-white md:w-5/12">

            {{-- Top --}}

            <div class="border b-2">
                <div class="flex items-center p-5">
                    <div class="flex items-center grow">
                        <img src="{{ $post->owner->image }}" alt="{{ $post->owner->username }}"
                            class="mr-5 h-10 w-10 rounded-full">
                        <div>
                            <a href="{{ $post->owner->username }}" class="font-bold">{{ $post->owner->username }}</a>
                            <p>{{ $post->description }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        @if (auth()->id() == $post->owner->id)
                            <a href="{{ route('post_edit', ['post' => $post->slug]) }}"><i
                                    class='bx bx-message-square-edit text-yellow-600 text-3xl'></i></a>

                            <form action="{{ route('delete_post', ['post' => $post->slug]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class='bx bx-trash text-red-600 text-3xl'
                                        onclick="return confirm('are you sure ?')"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Comments --}}

            <div class="grow">
                @foreach ($post->comments as $comment)
                    <div class="flex items-start px-5 py-2">
                        <img src="{{ $comment->owner->image }}" alt="" class="h-100 me-5 w-10 rounded-full">
                        <div class="flex flex-col">
                            <div>
                                <a href="/{{ $comment->owner->username }}"
                                    class="font-bold">{{ $comment->owner->username }}</a>
                                {{ $comment->body }}
                            </div>
                            <div class="mt-1 text-sm font-bold text-gray-400">
                                {{ $comment->created_at->shortAbsoluteDiffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="border border-t-2g p-5">
                <form action="/p/{{ $post->slug }}/comment" method="post">
                    @csrf
                    <div class="flex flex-row">
                        <textarea name="body" id="comment_body" placeholder="{{ __('Add a comment...') }}"
                            class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"></textarea>
                        <button type="submit"
                            class="ltr:ml-5 rtl:mr-5 border-none bg-white text-blue-500">{{ __('Post') }}</button>
                    </div>
                </form>
            </div>
        </div>



    </div>

</x-app-layout>
