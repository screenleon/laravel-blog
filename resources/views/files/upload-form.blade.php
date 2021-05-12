<x-app-layout>
    <h1 class="my-4">Upload Form
    </h1>

    <form action="{{ route('fileStore') }}" method="post" enctype="multipart/form-data" accept="image/*">
        @csrf
        <div class="input-group">
            <input type="file" name="file" id="inputFileUpload">
            <div class="input-group-append">
                <input type="submit" value="Upload" class="btn btn-primary">
            </div>
        </div>
    </form>
</x-app-layout>