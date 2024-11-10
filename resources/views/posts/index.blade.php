<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Related Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <h1 class="text-center pt-4">Show Related Posts in <strong class="text-danger">Laravel</strong></h1>
        <hr>

        <div class="row py-2">
            <div class="col-md-6">
                <h2>List of posts</h2>
            </div>
            <div>
                <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">Create post</a>
            </div>
        </div>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-title">
                        <a href="{{ route('posts.show', $post) }}" class="card-link">{{ $post->title }}</a>
                    </p>
                    <p class="card-text">{{ $post->description }}</p>
                    <p>Category: {{ $post->category->name }}</p>
                </div>
                <div>
                    @foreach ($post->images as $image)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Post Image" width="100">
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</body>
</html>
