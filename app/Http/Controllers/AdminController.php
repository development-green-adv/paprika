<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\ImageGallery;
use App\Product;
use App\Dodatak;
use App\product_dodatak;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function loginView(){

        // ako je korisnik ulogovan ne moze otici na login ponovo 
        if(!Auth::guest()){
            return view("admin/pages/home");
        }else{
            return view("admin/pages/login");
        }

    } 

    public function homePage(){

        return view("admin/pages/home");

    }


    public function getAddProducts(){

        $gallery = new ImageGallery();
        $allImages = $gallery->orderBy('id', 'DESC')->get();
        $allDodatak = Dodatak::where("status", 1)->get();
        return view("admin/pages/add-product", compact("allImages", "allDodatak"));

    }


    public function storeProduct(Request $request){

        $product = new Product();

        $product->category      = $request->input("category");
        $product->title         = $request->input("title");
        $product->description   = $request->input("description");
        $product->cena          = $request->input("cena");
        $product->na_naslovnoj  = $request->input("na_naslovnoj");
        $product->cena_32       = $request->input("pica_32");
        $product->cena_50       = $request->input("pica_50");
        $product->slika         = $request->input("mainImage");
        $product->status        = $request->input("status");

        $productSave = $product->save();

        if($productSave){

            $lastProduct = Product::orderBy("id", "desc")->pluck('id')->first();

            if($request->input("dodatal") != ""){

                foreach($request->input("dodatak") as $doda){

                    $productDodatak = new product_dodatak();

                    $productDodatak->id_product = $lastProduct;
                    $productDodatak->id_dodatak = $doda;

                    $productDodatak->save();
                }

            }
            return redirect()->back()->with('success', "Uspesno ste dodali proizvod");

        }else{

            return redirect()->back()->with("messageError", "Niste dodali proizvod");

        }

    }


    public function listProducts(){

        $data = Product::get();
        return view("admin/pages/list-product", compact("data"));

    }


    public function getEditProduct($id){

        $gallery = new ImageGallery();
        $allImages = $gallery->orderBy('id', 'DESC')->get();

        $allDodatak = Dodatak::where("status", 1)->get();
        $product = Product::where("id", $id)->first();
        $productDodatak = product_dodatak::where("id_product", $id)->pluck("id_dodatak")->toArray();

        return view("admin/pages/edit-product", compact("allDodatak", "allImages", "product", "productDodatak"));

    }


    public function updateProduct(Request $request){

        /*
        *   Ovde proveravam sledeci slucaj
        *   Pica nije kao ostali proizvodi, ona moze imati 2 cene za 32 i 50cm, a generalna cena se odnosti na ostale proizvode
        *   Tako da ako se radi o kategoriji koja je pica, cena se setuje na null, u suprotnom se cena_32 i cena_50 se podesavaju na null jer nece biti kategorija pica
        *   Razlog zasto ovo radim je da u bazi ne gomilam podatke koje necu koristiti u prikazu.
        **/

        if($request->input("category") == "pizze"){

            $pica_32 = $request->input("pica_32");
            $pica_50 = $request->input("pica_50");
            $cena = "";

        }else{

            $pica_32 = "";
            $pica_50 = "";
            $cena = $request->input("cena");

        }

        $updateProduct = Product::where("id", $request->input("id"))->update([

            'category'      => $request->input("category"),
            'title'         => $request->input("title"),
            'description'   => $request->input("description"),
            'cena'          => $cena,
            'na_naslovnoj'  => $request->input("na_naslovnoj"),
            'cena_32'       => $pica_32,
            'cena_50'       => $pica_50,
            'slika'         => $request->input("mainImage"),

        ]);

        if($updateProduct){

            $deleteProductDodatak = product_dodatak::where("id_product", $request->input("id"))->delete();

            if($deleteProductDodatak){

                if($request->input("dodatak") != ""){

                    foreach($request->input("dodatak") as $doda){

                        $productDodatak = new product_dodatak();
        
                        $productDodatak->id_product = $request->input("id");
                        $productDodatak->id_dodatak = $doda;
        
                        $productDodatak->save();
                    }

                }

                return redirect()->back()->with('success', "Uspesno ste izmenili proizvod");

            }else{

                foreach($request->input("dodatak") as $doda){

                    $productDodatak = new product_dodatak();
    
                    $productDodatak->id_product = $request->input("id");
                    $productDodatak->id_dodatak = $doda;
    
                    $productDodatak->save();
                }

                return redirect()->back()->with('success', "Uspesno ste izmenili proizvod");

            }

        }else{

            return redirect()->back()->with("messageError", "Niste izmenili proizvod");

        }


    }


    public function deleteProduct($id){

        $deleteProduct = Product::where("id", $id)->delete();
        
        if($deleteProduct){

            $deleteProductDodatak = product_dodatak::where("id_product", $id)->delete();

            if($deleteProductDodatak){

                return redirect()->back()->with('success', 'Uspešno ste izbrisali proizvod');

            }

        }else{

            return redirect()->back()->with("messageError", "Niste izbrisali proizvod");

        }

    }


    public function getSortProduct(){

        return view("admin/pages/sort-product");

    }


    public function sortedProduct(Request $request){

        return $request;

    }




























   

    public function getAddDodatak(){

        return view("admin/pages/add-dodatak");

    }

    
    public function storeDodatak(Request $request){

        $dodatak = new Dodatak();

        $dodatak->dodatak_name  = $request->input("dodatak_name");
        $dodatak->dodatak_price = $request->input("dodatak_price");
        $dodatak->status        = $request->input("status");

        $dodatakSave = $dodatak->save();

        if($dodatakSave){

            return redirect()->back()->with('success', 'Uspešno ste dodali dodatak');

        }else{

            return redirect()->back()->with("messageError", "Niste dodali dodatak");

        }

    }


    public function listDodatak(){

        $data = Dodatak::get();
        return view("admin/pages/list-dodatak", compact("data"));

    }


    public function deleteDodatak($id){

        $deleteDodatak = Dodatak::where("id", $id)->delete();
        
        if($deleteDodatak){

            $deleteProductDodatak = product_dodatak::where("id_dodatak", $id)->delete();

            if($deleteProductDodatak){

                return redirect()->back()->with('success', 'Uspešno ste izbrisali dodatak');

            }

        }else{

            return redirect()->back()->with("messageError", "Niste izbrisali dodatak");

        }

    }






































    public function storeImages(Request $request){
        
        $images = $request->file("images");

        for($i = 0; $i < count($images); $i++){

            $new = $i.time().".".$images[$i]->getClientOriginalExtension();
            $slika = $images[$i]->move(public_path("images_gallery"), $new);

            $gallery = new ImageGallery();
            $gallery->image_name = $new;
            $gallery->save();

        }

        $gallery = new ImageGallery();
        $allImages = $gallery->orderBy('id', 'DESC')->get();

        return $allImages;

    }




    public function getAddAdmin(){

        return view("admin/pages/dodaj-administratora");

    }

    public function storeAdmin(Request $request){

        $user = new User();

        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));

        $storeAdmin = $user->save();

        if($storeAdmin){

            return redirect()->back()->with("success", "Admin je uspesno dodat");

        }else{

            return redirect()->back()->with("Niste dodali admina");

        }

    }

    public function listAdmins(){

        $users = User::get();

        return view("admin/pages/lista-administratora", compact("users"));

    }

    public function deleteAdmin($id){

        $deleteUser = User::where("id", $id)->delete();

        if($deleteUser){

            return redirect()->back()->with("success", "Admin je uspesno izbrisan");

        }else{

            return redirect()->back()->with("Niste izbrisali admina");

        }

    }

}
