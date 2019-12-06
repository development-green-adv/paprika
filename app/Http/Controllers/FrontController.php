<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\product_dodatak;
use App\Dodatak;

class FrontController extends Controller
{
    

    public function getMenuPage($category="pizze"){

        /*
        *   Potrebno je da prilikom povlacenja proizvoda budu orderovani ASC po orderNumber jer ce se tako slagati na frontu
        **/
        $products = Product::where("category", $category)->get();
        $productDodatak = product_dodatak::get();
        $dodaci = Dodatak::get();
        return view("meni", compact("products", "category", "productDodatak", "dodaci"));
    
    }


    public function getPaprikaLive(){

        return view("/paprika-live");

    }


    public function getAbout(){

        return view("/o-nama");

    }


    public function getKontakt(){

        return view("/kontakt");

    }


}
