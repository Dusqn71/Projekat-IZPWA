<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories() {
        return view("admin.categories", [
            "categories" => Category::all(),
        ]);
    }

    public function createCategory() {
        return view("admin.addcategory");
    }    

    public function storeCategory(Request $request) {
        if(empty($request->name)) {
            return redirect()->back()->with("error", "Morate popuniti polje za naziv!");
        }

        Category::create([
            "name" => $request->name,
        ]);

        return redirect(url('/admin-categories'))->with('success', "Uspesno ste dodali kategoriju!");
    }

    public function deleteCategory($id) {
        return view("admin.deletecategory", [
            "id" => $id,
        ]);
    }

    public function destroyCategory($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect(url('/admin-categories'))->with("success", "Kategorija uspesno obrisana!");
    }

    public function editCategory($id) {
        $category = Category::findOrFail($id);
        return view('admin.editcategory', [
            'category' => $category,
        ]);
    }

    public function updateCategory(Request $request, $id) {
        if(empty($request->name)) {
            return redirect()->back()->with("error", "Morate uneti polje za naziv!");
        }

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect(url('/admin-categories'))->with("success", "Kategorija uspesno izmenjena!");
    }
}
