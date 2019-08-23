@extends('layouts.admin')

@section('content')

    <div class="container">

        <a class="btn btn-danger" href="/admin">Back</a>

        @isset($fromEbookSearch)
            @include('/admin/boostrap-tables/ebook/ebooktable')
        @endisset

        @isset($fromAuthorSearch)
            @include('/admin/boostrap-tables/author/authortable')
        @endisset

        @isset($fromPublisherSearch)
            @include('/admin/boostrap-tables/publisher/publishertable')
        @endisset

    </div>

@endsection
