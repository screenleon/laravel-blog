<x-app-layout>
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

    @foreach ($posts as $post)
        <x-blog-posts :post="$post"></x-blog-posts>
    @endforeach
    
    <div class="mb-4">
        {{ $posts->links() }}
    </div>

    <x-slot name="sideBar">
        <x-search-widget></x-search-widget>
        <x-categories-widget></x-categories-widget>
    </x-slot>
</x-app-layout>
