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

        <h1 class="text-center pt-4">Create Post <strong class="text-danger">with multiple images</strong></h1>
        <hr>

        <div class="row py-2">
            <div class="col-md-6">
                <h2>Fill out the form</h2>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Post Title:</label>
                        <input type="text" name="title" required>
                        @error('title')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Description:</label>
                        <textarea name="description"></textarea>
                        @error('description')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Category:</label>
                        <select id="category" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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

                    <button type="submit">Create Product</button>
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
