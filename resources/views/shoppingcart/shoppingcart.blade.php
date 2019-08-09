@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Item Price</th>
                <th scope="col">Total</th>
                <th scope="col">Change Quantity</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($shoppingCartItems as $shoppingCartItem)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$shoppingCartItem->itemName}}</td>
                    <td>{{$shoppingCartItem->description}}</td>
                    <td>{{$shoppingCartItem->quantity}}</td>
                    <td>{{$shoppingCartItem->itemPrice}}</td>
                    <td>{{$shoppingCartItem->total}}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#shoppingcartitemupdatemodel{{$shoppingCartItem->lineNo}}">Change Quantity</button></td>
                    @include('/shoppingcart/boostrap-models/shoppingcartitemupdatemodel')
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#shoppingcartitemdeletemodel{{$shoppingCartItem->lineNo}}">Remove</button></td>
                    @include('/shoppingcart/boostrap-models/shoppingcartitemdeletemodel')
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="row">
        <div class="col-7">
            Sub Total
        </div>
        <div class="col-3">
            {{$subTotal}}
        </div>
        <div class="float-right col-2">
            <form action='/admin/shoppingcart/purchase'>
                <button class="btn btn-warning col-12" type="submit">Purchase</button>
            </form>
        </div>
    </div>
</div>
@endsection
