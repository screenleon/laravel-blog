<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">
            @foreach ($categories as $category)
                @if ($loop->index % 3 === 0)
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                @endif
                            <li>
                                <a href="{{ route('posts.index', ['category' => $category->name]) }}">{{ $category->name }}</a>
                            </li>
                @if ($loop->iteration % 3 === 0 || $loop->iteration === $loop->last)
                        </ul>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
