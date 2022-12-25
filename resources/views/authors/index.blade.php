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
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>Data author</h1>
        <a class="btn btn-primary" href="{{ route('createauthor') }}" role="button">CREATE NEW AUTHOR</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PHOTO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">TELEPON</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td><img src="{{ $author['photo'] }}" alt=""></td>
                        <td>{{ $author['author_name'] }}</td>
                        <td>{{ $author['telephone'] }}</td>
                        <td>
                            <div><a class="btn btn-primary" href="{{ route('authorshow', ['id' => $author['id']]) }}"
                                    role="button">Detail</a><a class="btn btn-danger"
                                    href="{{ route('authordelete', ['id' => $author['id']]) }}"
                                    role="button">Delete</a>


                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
