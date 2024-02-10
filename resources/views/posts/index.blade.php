<x-app-layout>

    <div class="flex flex-row max-w-3xl gap-8 mx-auto">

        {{-- left side --}}

        <div class="w-[30rem] mx-auto lg:w-[95rem]">
            @forelse ($posts as $post)
                <x-post :post="$post" />
            @empty

                <div class="max-w-2xl gap-8 mx-auto">
                    {{ __('Start Following Your Friends And Enjoy') }}
                </div>
            @endforelse
        </div>


        {{-- right side --}}

        <div class="hidden w-[60rem] lg:flex lg:flex-col pt-4">
            <div class="flex flex-row text-sm">
                <div class="mr-5">

                    <a href="{{ auth()->user()->username }}">
                        <img src="{{ auth()->user()->image }}" alt="{{ auth()->user()->username }}"
                            class="border border-gray-300 rounded-full h-12 w-12">
                    </a>
                </div>
                <div class="flex flex-col">
                    <a href="{{ auth()->user()->username }}" class="font-bold">{{ auth()->user()->username }}</a>
                    <div class="text-gray-500 text-sm">{{ auth()->user()->name }}</div>
                </div>


            </div>
            <div class="mr-5 mt-5">
                <h3 class="text-gray-500 font-bold">{{ __('Suggestion For Your') }}</h3>
            </div>
            <ul>

                @foreach ($suggested_users as $suggested_user)
                    <li class="flex flex-row my-5 text-sm justify-center">

                        <div class="mr-5">
                            <a href="{{ $suggested_user->username }}">
                                <img src="{{ $suggested_user->image }}" alt="{{ $suggested_user->username }}"
                                    class="w-9 h-9 rounded-full border border-gray-300"></a>
                        </div>
                        <div class="flex flex-col grow">
                            <a href="{{ $suggested_user->username }}"
                                class="font-bold">{{ $suggested_user->username }}</a>
                            <div class="text-gray-500 text-sm">{{ $suggested_user->name }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-app-layout>
