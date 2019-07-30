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

        if(!Schema::hasTable('shoppingcart'.Auth::id())){
            DB::statement('CREATE TABLE shoppingcart'.Auth::id().' (
                lineNo int AUTO_INCREMENT PRIMARY KEY,
                itemName varchar(255),
                description varchar(255),
                quantity int(10),
                itemPrice int(10),
                total int(10),
                updated_at varchar(100),
                created_at varchar(100)
            )');
        }

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

    public function getSubTotal(){

        $shoppingcart = new ShoppingCart();

        $shoppingcart->setTable('shoppingcart'.Auth::id());

        $sumOfColTotal=$shoppingcart->sum('total');

        return $sumOfColTotal;
    }

}
