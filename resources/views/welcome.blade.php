<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Music</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('createMusic') }}">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center mt-4">View Musics</h1>

    <div class="text-center mb-4">
        <a href="{{ route('createMusic') }}">
            <button class="btn btn-success">Create</button>
        </a>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($musics as $music)
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('/storage/images/'.$music->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title: {{$music->title}}</h5>
                        <p class="card-text">Singer: {{$music->singer}}</p>
                        <p class="card-text">Publication Date: {{$music->publication_date}}</p>
                        <p class="card-text">Duration (second): {{$music->duration}}</p>
                        <p class="card-text">Genre: {{$music->category->category_name}}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('editMusic', $music->id)}}" class="btn btn-success">Edit</a>

                        <form action="{{route('deleteMusic', $music->id)}}" method= "POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

