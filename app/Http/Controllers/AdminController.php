<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome() {
        return view('admin.home');
    }

    public function getAddProduct() {
        return view('admin.add_product', [
            "categories" => Category::all()
        ]);
    }

    public function postAddProduct(Request $request) {
        $product = $this->createProduct($request);

        $product->save();
        $product->attachCategories($request->categories);

        return view('admin.add_product', [
            "categories" => Category::all()
        ]);
    }

    private function createProduct($request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'categories' => 'required|array',
            'count' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0'
        ]);


        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->count = $request->count;
        $product->price = intval($request->price*100);

        return $product;
    }

    public function getAddCategory() {
        return view('admin.add_category');
    }

    public function postAddCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return view('admin.add_category');
    }

    public function getModifyProducts() {
        return view('admin.modify-products', [
            "products" => Product::with('categories')->get(),
            "categories" => Category::all()
        ]);
    }

    public function postModifyProducts(Request $request) {
        $product = Product::find($request->productid);
        $product->updateCategories($request->categories);

        $data = $request->only("name", "description", "count", "price");
        $data["price"] = intval($request->price * 100);
        $product->update($data);


        return redirect("admin/modify-products");
    }

    public function deleteProduct(Request $request) {
        $product = Product::find($request->productid);
        $product->delete();

        return redirect("admin/modify-products");
    }

    public function sanitize(){
        $sanitized = [];
        foreach($this->all() as $key => $value) {
            $sanitized[$key] = htmlspecialchars($value);
        }

        return $sanitized;
    }

    public function getModifyCategories() {
        return view('admin.modify_category', [
            "categories" => Category::all()
        ]);
    }

    public function postModifyCategories(Request $request) {
        $category = Category::find($request->id);
        $category->update(["name" => $request->name]);

        return redirect("admin/modify-categories");
    }

    public function deleteCategory(Request $request) {
        $category = Category::find($request->id);
        $category->delete();

        return view('admin.modify_category', [
            "categories" => Category::all()
        ]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255'
        ]);
    }

}