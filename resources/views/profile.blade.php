@extends('layouts.app')

@section('shoppingcartLogo')
<a href="{{url('/shoppingcart')}}" class="btn btn-primary">
    Shoppingcart <span class="badge badge-light">{{$countOfshoppingcartItems}}</span>
</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-homelibrary-list" data-toggle="list" href="#list-homelibrary" role="tab" aria-controls="homelibrary">Home Library</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
          </div>
        </div>
        <div class="col-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-homelibrary" role="tabpanel" aria-labelledby="list-homelibrary-list">
                <table class="table">
                    <caption>List of users</caption>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($ebooks as $ebook)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$ebook->title}}</td>
                            <td>{{$ebook->description}}</td>
                            <td>{{$ebook->category}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
          </div>
        </div>
      </div>
</div>
@endsection
