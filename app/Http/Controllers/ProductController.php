<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view("public.home", [
            "products" => Product::all(),
        ]);
    }

    public function ponuda() {
        return view("public.ponuda", [
            "products" => Product::all(),
        ]);
    }

    public function kontakt() {
        return view("public.kontakt");
    }

    public function single($id) {
        $product = Product::find($id);
        return view("public.single", [
            "product" => $product,
        ]);
    }

    public function main() {
        return view("admin.main");
    }

    public function products() {
        return view("admin.products", [
            "products" => Product::with('category')->get(),
            "categories" => Category::all()
        ]);
    }

    public function create() {
        $categories = Category::all();
        return view("admin.addproduct", [
            "categories" => $categories
        ]);
    }

    public function store(Request $request) {
        if(empty($request->name) or empty($request->description) or empty($request->price) or empty($request->image) or empty($request->category_id)) {
            return redirect()->back()->with("error", "Sva polja su obavezna!");
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'products/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), basename($imageName));
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ]);

        return redirect(url('/admin-products'))->with("success", "Proizvod je uspesno kreiran!");

    }

    public function delete($id) {
        return view("admin.delete", [
            "id" => $id,
        ]);
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect(url("/admin-products"))->with("success", "Proizvod je uspesno obrisan!");
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view("admin.edit", [
            "product" => $product,
            'categories' => $categories, 
        ]);
    }

    public function update(Request $request, $id) {
        if(empty($request->name) or empty($request->description) or empty($request->price) or empty($request->category_id)) {
            return redirect()->back()->with("error", "Sva polja su obavezna!");
        }

        $product = Product::find($id);
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
    
            $image = $request->file('image');
            $imageName = 'products/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), basename($imageName));
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->is_featured = $request->has('is_featured') ? 1 : 0;
        $product->save();

        return redirect(url("/admin-products"))->with("success", "Uspesno izmenjen proizvod!");
    }
}
