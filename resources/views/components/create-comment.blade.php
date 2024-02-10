<form action="/p/{{ $post->slug }}/comment" method="post">
    @csrf
    <div class="flex flex-row">
        <input name="body" id="comment_body" placeholder="{{ __('Add a comment...') }}"
            class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0" />
        <button type="submit" class="ltr:ml-5 rtl:mr-5 border-none bg-white text-blue-500">{{ __('Post') }}</button>
    </div>
</form>
