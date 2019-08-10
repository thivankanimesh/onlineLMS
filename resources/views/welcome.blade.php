<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Library Management System</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">

                            @auth
                                <a href="{{ url('/profile') }}">Profile</a>

                                @if(Schema::hasTable('shoppingcart'.Auth::id()))
                                    <a href="{{url('/admin/shoppingcart')}}" class="btn btn-primary">
                                        Shoppingcart <span class="badge badge-light">{{$countOfshoppingcartItems}}</span>
                                    </a>
                                @endif

                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>

                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                                @endif

                            @endauth

                            <a href="/admin" class="btn btn-danger">Admin Login</a>

                            </ul>
                        </div>
                    </div>
                </nav>
            @endif

            <div class="container">
                    <div class="row justify-content-center">
                @foreach ($ebooks as $ebook)

                <div class="col-md-3.5">
                <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url('coverpics/'.$ebook->coverpic)}}" class="card-img-top" alt="..." width="286" height="180">
                        <div class="card-body">
                          <h5 class="card-title">{{$ebook->title}}</h5>
                          <p class="card-text">{{$ebook->desc}}</p>
                          <h5 class="card-title">Price {{$ebook->price}}</h5>
                          <a href="/admin/shoppingcart/addtocart/{{$ebook->eid}}" class="btn btn-primary">Add To Cart</a>
                        </div>
                      </div>
                </div>

                @endforeach
            </div>
            </div>
        </div>
    </body>
</html>


