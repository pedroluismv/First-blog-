@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="@if ($post->image) {{ Storage::url($post->image->url) }}@else
    https://cdn.pixabay.com/photo/2020/07/21/16/24/landscape-5426755_960_720.jpg @endif" alt="">
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}"
                class="inline-block px-3 py-1 text-sm text-gray-700 mr-2 bg-gray-200 rounded-full">{{ $tag->name }}</a>
        @endforeach
    </div>
</article>
