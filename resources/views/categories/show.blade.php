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

        <h1 class="text-center pt-4">About Category</h1>
        <hr>

        <div class="p-3">
            <h5 class="card-title">{{ $category->name }}</h5>
            <div>
                @foreach ($category->images as $image)
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Category Image" width="100">
                    <form action="{{ route('category.image.destroy', ['category' => $category->id, 'image' => $image->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this image?')">
                            Delete
                        </button>
                    </form>
                @endforeach
            </div>

             <a href="{{ route('categories.edit', $category) }}" class="card-link">Edit</a>
        </div>
    </div>

</body>
</html>
