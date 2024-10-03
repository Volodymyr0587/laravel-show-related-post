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

        <h1 class="text-center pt-4">About Post</h1>
        <hr>

        <div class="p-3">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <p>{{ $post->category->name }}</p>
        </div>

        <h4 class="p-2">The Related Posts</h4>

        @if ($relatedPosts->count() > 0)
            @foreach ($relatedPosts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-title">
                            <a href="{{ route('posts.show', $post) }}" class="card-link">{{ $post->title }}</a>
                        </p>
                        <p class="card-text">{{ $post->description }}</p>
                        <p>Category: {{ $post->category->name }}</p>
                    </div>
                </div>
            @endforeach
        @else
        <p class="text-danger p-2">There Are No Releted Posts.</p>
        @endif



    </div>

</body>
</html>
