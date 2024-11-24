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

        <h1 class="text-center pt-4">Edit Post <strong class="text-danger">with multiple images</strong></h1>
        <hr>

        <div class="row py-2">
            <div class="col-md-6">
                <h2>Fill out the form</h2>

            <div class="container">
                <div class="row">
                @foreach ($post->images as $image)
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Post Image" width="100">
                        <form action="{{ route('post.image.destroy', ['post' => $post->id, 'image' => $image->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this image?')">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
                </div>
            </div>

                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label>Post Title:</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Description:</label>
                        <textarea name="description">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Category:</label>
                        <select id="category" name="category_id">
                            <option value="">Select Category</option>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Upload Images:</label>
                        <input type="file" name="images[]" multiple id="images-input">
                        <div id="image-preview"></div>
                    </div>
                    @error('images')
                        <p>{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-success">Update Post</button>
                </form>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are You Sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>

                <script>
                    document.getElementById('images-input').addEventListener('change', function (event) {
                        const previewContainer = document.getElementById('image-preview');
                        previewContainer.innerHTML = '';
                        Array.from(event.target.files).forEach(file => {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.width = 100;
                                previewContainer.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        });
                    });
                </script>

            </div>
        </div>



    </div>

</body>
</html>
