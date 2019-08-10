@extends('layouts.app')

@section('shoppingcartLogo')
    @if(Schema::hasTable('shoppingcart'.Auth::id()))
    <a href="{{url('/admin/shoppingcart')}}" class="btn btn-primary">
        Shoppingcart <span class="badge badge-light">{{$countOfshoppingcartItems}}</span>
    </a>
    @endif
@endsection

@section('content')
<div class="container">

        <div class="row">
            <div class="col-sm">
                <img src="{{Storage::url('coverpics/'.$ebook->coverpic)}}" width="500px" height="500px">
            </div>
            <div class="col-sm">
                <div class="row">
                    <label>Title :</label>
                    <div class="col-md-6">
                        {{$ebook->title}}
                    </div>
                </div>
                <div class="row">
                    <label>Description :</label>
                    <div class="col-md-6">
                        {{$ebook->desc}}
                    </div>
                </div>
                <div class="row">
                    <label>Category :</label>
                    <div class="col-md-6">
                        {{$ebook->category}}
                    </div>
                </div>
                <div class="row">
                    <label>Author :</label>
                    <div class="col-md-6">
                        {{$ebook->author}}
                    </div>
                </div>
                <div class="row">
                    <label>Publisher :</label>
                    <div class="col-md-6">
                        {{$ebook->publisher}}
                    </div>
                </div>
                <div class="row">
                    <label>Price :</label>
                    <div class="col-md-6">
                        {{$ebook->price}}
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-primary" href="/admin/shoppingcart/addtocart/{{$ebook->eid}}">Add To Cart</a>
                </div>
            </div>
        </div>

</div>
@endsection
