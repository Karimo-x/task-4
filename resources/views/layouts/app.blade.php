<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">logout</button>
                </form>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info btn btn-primary" aria-current="page"
                            href="{{ route('users.index') }}">users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info mx-3" aria-current="page"
                            href="{{ route('posts.index') }}">posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info" aria-current="page"
                            href="{{ route('categories.index') }}">categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info mx-3" aria-current="page"
                            href="{{ route('tags.index') }}">tags</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this object?');
        }
    </script>
</body>
</html>
