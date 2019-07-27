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

                            <li class="nav-item">
                                <a class="nav-link" href="/admin/logout">Logout</a>
                            </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            @endif

            <div class="container">
                <div>
                    <div class="row">
                        <div class="col-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Dashboard</a>
                            <a class="list-group-item list-group-item-action" id="list-ebook-list" data-toggle="list" href="#list-ebook" role="tab" aria-controls="ebook">eBook</a>
                            <a class="list-group-item list-group-item-action" id="list-author-list" data-toggle="list" href="#list-author" role="tab" aria-controls="author">Author</a>
                            <a class="list-group-item list-group-item-action" id="list-publisher-list" data-toggle="list" href="#list-publisher" role="tab" aria-controls="publisher">Publisher</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">User</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="tab-content" id="nav-tabContent">

                            <!--This is home related-->
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>

                            <!--This is ebooks related-->
                            <div class="tab-pane fade" id="list-ebook" role="tabpanel" aria-labelledby="list-ebook-list">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addeBook">Add eBook</button>

                                <!--This is ebooks list-->
                                <div class="container">
                                    <table class="table table-borderless">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Edit</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($ebooks as $ebook)
                                            <tr>
                                                <th scope="row">{{$loop->index+1}}</th>
                                                <td><img src="{{Storage::url('coverpics/'.$ebook->coverpic)}}"  alt="..." width="50" height="50"></td>
                                                <td>{{$ebook->title}}</td>
                                                <td>{{$ebook->author}}</td>
                                                <td>{{$ebook->price}}</td>
                                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ebookupdatemodel{{$ebook->eid}}">Edit</button></td>
                                                @include('/admin/boostrap-models/ebookupdatemodel')
                                            </tr>

                                            @endforeach

                                        </tbody>
                                      </table>
                                </div>

                                <!--Add eBook model-->
                                @include('/admin/boostrap-models/ebookaddmodel')

                            </div>

                            <!--This is authors related-->
                            <div class="tab-pane fade" id="list-author" role="tabpanel" aria-labelledby="list-author-list">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addAuthor">Add Author</button>
                                <button class="btn btn-primary" type="submit">Update Author</button>
                                <button class="btn btn-primary" type="submit">Delete Author</button>

                                <!--Add author model-->
                                @include('/admin/boostrap-models/authoraddmodel')

                            </div>

                            <!--This is publisher related-->
                            <div class="tab-pane fade" id="list-publisher" role="tabpanel" aria-labelledby="list-publisher-list">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addPublisher">Add Publisher</button>
                                    <button class="btn btn-primary" type="submit">Update Publisher</button>
                                    <button class="btn btn-primary" type="submit">Delete Publisher</button>

                                    <!--Add publisher model-->
                                    @include('/admin/boostrap-models/publisheraddmodel')

                                </div>

                            <!--This is users related-->
                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
