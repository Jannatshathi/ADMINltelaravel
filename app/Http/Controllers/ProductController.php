<?php
namespace App\Http\Controllers;
use Storage;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   public function addProduct(Request $request)
   {
      $this->validate($request, [
         'name' => 'required|string|max:255',
         'description' => 'required|string|max:855',
   ]);
   $product = new Product;
   $product->name = $request->name;
   $product->description = $request->description;
   $product->save();
   foreach ($request->file('images') as $imagefile) {
     $image = new Image;
     $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
     $image->url = $path;
     $image->product_id = $product->id;
     $image->save();
   }}
   public function indexProduct(){
       return view('pages.products.uploadimages');

       return redirect()->back();
   }

}

