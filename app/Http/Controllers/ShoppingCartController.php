<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Ebook;
use App\User;
use App\Optional\ShoppingCartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ShoppingCartController extends Controller
{

    public function index(){

        if(Auth::check()){

            $shoppingCartItems=DB::table('shoppingcart'.Auth::id())->get();
            $subTotal=DB::table('shoppingcart'.Auth::id())->sum('total');

            return view('/shoppingcart/shoppingcart')->with(['shoppingCartItems'=>$shoppingCartItems,'subTotal'=>$subTotal]);

        }else{

            return redirect('/login');
        }

    }

    public function addToCart($id){

        if(Auth::check()){

            error_log(Auth::id());

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
            $shoppingcartservice=new ShoppingCartService();

            $shoppingcartservice->addToCart($id);

            return redirect('/');
        }else{
            return redirect('/login');
        }
    }

    public function removeFromCart($id){
        if(Auth::check()){
            $shoppingcartservice=new ShoppingCartService();
            $shoppingcartservice->removeFromCart($id);

            return $this->index();
        }else{
            return redirect('/login');
        }
    }

    public function changeQuantity(Request $req, $id){
        if(Auth::check()){

            $quantity=$req->get('quantity');

            $shoppingcartservice=new ShoppingCartService();
            $shoppingcartservice->changeQuantity($id,$quantity);

            return $this->index();
        }else{
            return redirect('/login');
        }
    }

    public static function purchase(){

    }

}
