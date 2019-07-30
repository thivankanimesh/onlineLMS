<?php

namespace App\Optional;

use App\Ebook;

class LineItem{

    private $lineNo;
    private $itemName;
    private $description;
    private $quantity;
    private $itemPrice;
    private $total;

    public function __construct($id){

        $ebook=Ebook::find($id);
        $this->itemName=$ebook->title;
        $this->description=$ebook->desc;
        $this->quantity=1;
        $this->itemPrice=$ebook->price;
        $this->total=$this->itemPrice*$this->quantity;

    }

    public function getLineNo(){
        return $this->lineNo;
    }

    public function getItemName(){
        return $this->itemName;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getItemPrice(){
        return $this->itemPrice;
    }

    public function getTotal(){
        return $this->total;
    }

    public function changeQuantity($quantity){
        $this->quantity=$quantity;
        calculateTotal();
    }

    private function calculateTotal(){
        $total=$itemPrice*$quantity;
    }

}
