    @csrf

    <input type="file" class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl"
        name="image" id="file_input">
    <p class="text-sm text-gray-500 mt-2">PNG, JPG or GIF.</p>


    <textarea name="description" rows="5" class="mt-10 w-full border border-gray-200 rounded-xl">{{$post->description ?? ""}}</textarea>

