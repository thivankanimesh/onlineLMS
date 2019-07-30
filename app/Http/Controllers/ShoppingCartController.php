<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Optional\ShoppingCartService;

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

    public function purchase(){

        if(Auth::check()){

            $shoppingcartservice=new ShoppingCartService();

            $subTotal=$shoppingcartservice->getSubTotal();

            return redirect('/pay/'.$subTotal);

        }else{

            return redirect('/login');

        }

    }

}
