<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Details</title>
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
        <h2 class="mb-4">{{ $file->titre }}</h2>
        <p>Uploaded on: {{ $file->created_at }}</p>
        <p>downloads: {{ $file->downloads }} times</p>
        <a href="{{ route('download', $file->id) }}" class="btn btn-primary">Download</a>
    </div>

    <footer class="bg-light text-center p-3 mt-5">
        <p>&copy; 2023 File Sharing App</p>
    </footer>
</body>
</html>
