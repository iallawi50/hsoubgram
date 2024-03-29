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
            <x-create-edit-form />
    <x-primary-button class="mt-4">{{ __('Create Post') }}</x-primary-button>

        </form>
    </div>


</x-app-layout>
