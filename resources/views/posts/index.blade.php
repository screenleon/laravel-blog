<x-app-layout>
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

    <x-blog-posts></x-blog-posts>
    <x-blog-posts></x-blog-posts>
    <x-blog-posts></x-blog-posts>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>

    <x-slot name="sideBar">
        <x-search-widget></x-search-widget>
        <x-categories-widget></x-categories-widget>
    </x-slot>
</x-app-layout>
