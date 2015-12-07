<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Product;
use App\Order;

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

    private function getProducts($productids) {
        $products = [];
        foreach($productids as $index => $id) {
            $product = Product::find($id);
            $products[$index] = $product;
        }

        return $products;
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

        $trimmedName = $this->cleanName($request->name);
        

        Category::create([
            'name' => $trimmedName,
            'displayname' => $request->name,
            'navitem' => !is_null($request->navitem)
        ]);
        
        return view('admin.add_category');
    }

    private function cleanName($name) {
        $trimmedName = strtolower($name);
        $trimmedName = str_replace(" ", "-", $trimmedName);
        $trimmedName = preg_replace("/[^A-Za-z0-9\-]/", "", $trimmedName);

        return $trimmedName;

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
        $isNavitem = !is_null($request->navitem);

        $category->update([
            "displayname" => $request->name,
            "name" => $this->cleanName($request->name),
            "navitem" => $isNavitem
        ]);


        return redirect("admin/modify-categories");
    }

    public function deleteCategory(Request $request) {
        $category = Category::find($request->id);
        $category->delete();

        return view('admin.modify_category', [
            "categories" => Category::all()
        ]);
    }

    public function getManageOrders(Request $request) {
        return view('admin.manage_orders', [
            "orders" => Order::with('client', 'products')->get()
        ]);
    }

    public function deleteOrders(Request $request) {
        foreach($request->order as $id) {
            $order = Order::find($id);
            foreach($order->products as $product) {

                $product->count += $product->pivot->count;
                $product->save();
            }

            $order->delete();

        }

        return redirect("/admin/manage-orders");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255'
        ]);
    }

}