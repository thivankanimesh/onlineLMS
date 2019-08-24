@extends('layouts.admin')

@section('content')

            <div class="container">
                <div>
                    <div class="row">
                        <div class="col-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Dashboard</a>
                            <a class="list-group-item list-group-item-action" id="list-ebook-list" data-toggle="list" href="#list-ebook" role="tab" aria-controls="ebook">eBooks</a>
                            <a class="list-group-item list-group-item-action" id="list-author-list" data-toggle="list" href="#list-author" role="tab" aria-controls="author">Authors</a>
                            <a class="list-group-item list-group-item-action" id="list-publisher-list" data-toggle="list" href="#list-publisher" role="tab" aria-controls="publisher">Publishers</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Users</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="tab-content" id="nav-tabContent">

                            <!--This is home related-->
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>

                            <!--This is ebooks related-->
                            <div class="tab-pane fade" id="list-ebook" role="tabpanel" aria-labelledby="list-ebook-list">
                                <div>
                                    <table>
                                        <tr>
                                            <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addeBook">Add eBook</button></td>
                                            <td>
                                                <form action="/admin/ebook/search">
                                                    Search <input name="query" type="text" />
                                                    <input type="submit" value="Search" />
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <!--This is recently added ebooks table-->
                                <div id="ebooktable" class="ebooktable">
                                @include('/admin/boostrap-tables/ebook/ebooktable')
                                </div>

                                <!--Add eBook model-->
                                @include('/admin/boostrap-models/ebook/ebookaddmodel')

                            </div>

                            <!--This is authors related-->
                            <div class="tab-pane fade" id="list-author" role="tabpanel" aria-labelledby="list-author-list">
                                <div>
                                    <table>
                                        <tr>
                                            <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addAuthor">Add Author</button></td>
                                            <td>
                                                <form action="/admin/author/search">
                                                    Search <input name="query" type="text" />
                                                    <input type="submit" value="Search" />
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <!--This is recently added authors table-->
                                @include('/admin/boostrap-tables/author/authortable')

                                <!--Add author model-->
                                @include('/admin/boostrap-models/author/authoraddmodel')

                            </div>

                            <!--This is publisher related-->
                            <div class="tab-pane fade" id="list-publisher" role="tabpanel" aria-labelledby="list-publisher-list">
                                <div>
                                    <table>
                                        <tr>
                                            <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addPublisher">Add Publisher</button></td>
                                            <td>
                                                <form action="/admin/publisher/search">
                                                    Search <input name="query" type="text" />
                                                    <input type="submit" value="Search" />
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                                    <!--This is recently added publishers table-->
                                    @include('/admin/boostrap-tables/publisher/publishertable')

                                    <!--Add publisher model-->
                                    @include('/admin/boostrap-models/publisher/publisheraddmodel')

                                </div>

                            <!--This is users related-->
                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
