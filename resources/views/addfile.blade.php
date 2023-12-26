<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('file.index') }}">File Sharing App</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('file.create') }}">Upload</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Upload File</h2>
        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <input type="text" class="form-control" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">Choose File:</label>
                <input type="file" class="form-control-file" name="file" accept=".pdf, .doc, .docx, .txt" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <footer class="bg-light text-center p-3 mt-5">
        <p>&copy; 2023 File Sharing App</p>
    </footer>
</body>
</html>
