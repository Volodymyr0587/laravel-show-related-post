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
                <h2>List of categories</h2>
            </div>
            <div>
                <a href="{{ route('categories.create') }}" class="text-blue-500 hover:underline">Create category</a>
            </div>
        </div>

        @foreach ($categories as $category)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-title">
                        <a href="{{ route('categories.show', $category) }}" class="card-link">{{ $category->name }}</a>
                    </p>
                </div>
                <div>
                    @foreach ($category->images as $image)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Category Image" width="100">
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</body>
</html>
