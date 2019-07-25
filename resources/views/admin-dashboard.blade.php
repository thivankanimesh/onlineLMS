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
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">eBook</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">User</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addeBook">Add eBook</button>
                                <button class="btn btn-primary" type="submit">Update eBook</button>
                                <button class="btn btn-primary" type="submit">Delete eBook</button>


                                <!--Add eBook model-->
                                <div id="addeBook" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Adding eBook</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form action="/ebook/add" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">

                                                    <div class="form-group row">
                                                    <label for="ebookTitle" class="col-sm-2 col-form-label">Title</label>
                                                        <div class="col-sm-10">
                                                            <input name="title" type="text" class="form-control" id="ebookTitle" placeholder="Enter title" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="ebookDescription" class="col-sm-2 col-form-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="description" class="form-control" id="ebookDescription" rows="3" placeholder="Enter description" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="ebookPrice" class="col-sm-2 col-form-label">Price</label>
                                                        <div class="col-sm-10">
                                                            <input name="price" type="number" class="form-control" id="ebookPrice" placeholder="Enter price" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="ebookCoverpic" class="col-sm-2 col-form-label">Choose Cover</label>
                                                        <div class="col-sm-10">
                                                            <input name="coverpic" type="file" class="form-control" id="ebookCoverpic" accept="image/*" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="ebookPdf" class="col-sm-2 col-form-label">Choose Pdf</label>
                                                        <div class="col-sm-10">
                                                            <input name="pdf" type="file" class="form-control" id="ebookPdf" accept=".pdf" required>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>

                            </div>
                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </body>
</html>
