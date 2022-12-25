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
        <h1>form buku</h1>

        <form action="{{ route('bookupdate', ['id' => $book['id']]) }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label for="formFile" class="form-label">photo</label>
                <input class="form-control" name="photo" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $book['title'] }}">
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Penerbit</label>
                <input type="text" name="publisher" class="form-control" value="{{ $book['publisher'] }}">
            </div>
            <div class="mb-3">
                <label for="publish_year" class="form-label">Tahun terbit</label>
                <input type="number" name="publish_year" class="form-control" value="{{ $book['publish_year'] }}">
            </div>

            <div class="mb-3">
                <label for="id_author" class="form-label">Author</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_author">
                    @foreach ($authors as $author)
                        @if ($book['id_author'] == $author['id'])
                            <option value="{{ $author['id'] }}" selected>{{ $author['author_name'] }}</option>
                        @else
                            <option value="{{ $author['id'] }}">{{ $author['author_name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_category" class="form-label">Category</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_category">

                    @foreach ($categories as $category)
                        @if ($book['id_category'] == $category['id'])
                            <option value="{{ $category['id'] }}" selected>{{ $category['category_name'] }}</option>
                        @else
                            <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Input</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
