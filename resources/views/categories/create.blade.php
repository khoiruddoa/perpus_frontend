<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('book') }}">book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('author') }}">author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category') }}">category</a>
                </li>


            </ul>
        </div>
    </nav>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>form category</h1>

        <form action="{{ route('categorystore') }}" method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
                <label for="title" class="form-label">Nama</label>
                <input type="text" name="category_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">description
                </label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">telephone</label>
                <input type="number" name="telephone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio
                </label>
                <input type="text" name="bio" class="form-control">
            </div>



            <button type="submit" class="btn btn-primary">Input</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
