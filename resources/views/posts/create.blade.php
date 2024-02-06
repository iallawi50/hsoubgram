<x-app-layout>


    <div class="card p-10">

        <h1 class="text-3xl mb-10">{{ __('Create a new post') }}</h1>

        {{-- Errors --}}
        <div class="flex flex-col justify-center items-center w-full">
            @if ($errors->any())
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>


        {{-- Form --}}

        <form action="/p/create" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf

            <input type="file" class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl"
                name="image" id="file_input">
            <p class="text-sm text-gray-500 mt-2">PNG, JPG or GIF.</p>


            <textarea name="description" rows="5" class="mt-10 w-full border border-gray-200 rounded-xl"></textarea>

            <x-primary-button class="mt-4">{{ __('Create Post') }}</x-primary-button>
        </form>
    </div>


</x-app-layout>
