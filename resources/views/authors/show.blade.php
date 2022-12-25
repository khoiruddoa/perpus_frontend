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
                    <a class="nav-link" href="{{ route('book') }}">Book</a>
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
        <h1>Detail</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ $author['photo'] }}" class="card-img-top" alt="">
            <div class="card-body">
                <h3 class="card-title">{{ $author['author_name'] }}</h3>
                <p class="card-text">{{ $author['address'] }}</p>
                <p class="card-text">{{ $author['telephone'] }}</p>
                <p class="card-text">{{ $author['email'] }}</p>
                <p class="card-text">{{ $author['bio'] }}</p>
                <a href="{{ route('editauthor', ['id' => $author['id']]) }}" class="btn btn-primary">edit</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
