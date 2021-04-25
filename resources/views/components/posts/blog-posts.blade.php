<div class="card mb-4">
    {{-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> --}}
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text line-clamp-3">{{ $post->content }}</p>
        <a href="{{ route('posts.view', $post) }}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        Posted {{ $post->updated_at->diffForHumans() }} by
        <a href="#">{{ $post->author->name }}</a>
    </div>
</div>
