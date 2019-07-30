<?php

namespace App\Optional;

use DB;
use Auth;
use App\Ebook;
use App\ShoppingCart;
use App\Optional\LineItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ShoppingCartService{

    public function addToCart($id){

        $lineItem=new LineItem($id);

        $shoppingcart=new ShoppingCart();

        $shoppingcart->setTable('shoppingcart'.Auth::id());

        $shoppingcart->lineNo=$lineItem->getLineNo();
        $shoppingcart->itemName=$lineItem->getItemName();
        $shoppingcart->description=$lineItem->getDescription();
        $shoppingcart->quantity=$lineItem->getQuantity();
        $shoppingcart->itemPrice=$lineItem->getItemPrice();
        $shoppingcart->total=$lineItem->getTotal();

        $shoppingcart->save();
    }

    public function removeFromCart($id){

        DB::table('shoppingcart'.Auth::id())->where('lineNo',$id)->delete();

    }

    public function changeQuantity($id, $quantity){

        $shoppingcart = new ShoppingCart();

        $shoppingcart->setTable('shoppingcart'.Auth::id());

        $filteredResult=$shoppingcart->where('lineNo',$id)->get('itemPrice','total');

        $itemPrice=$filteredResult[0]->itemPrice;
        $total=$filteredResult[0]->total;

        $total=(float)$itemPrice*(int)$quantity;

        DB::table('shoppingcart'.Auth::id())->where('lineNo',$id)->update(['quantity'=>$quantity,'total'=>$total]);

    }

}
