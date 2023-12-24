<x-app-layout>
    @include('posts/form', ['url' => route('posts.update', $post->id)])
</x-app-layout>