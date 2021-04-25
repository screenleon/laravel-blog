<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <form action="{{ route('posts.index') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="search">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
</div>
