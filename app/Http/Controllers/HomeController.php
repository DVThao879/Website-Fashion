<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        // Lấy 3 danh mục nhiều sản phẩm nhất
        $topCategories = Category::withCount(['products' => function($query) {
            $query->where('is_active', 1);
        }])->where('is_active', 1)->orderBy('products_count', 'desc')->limit(3)->get();
        // Lấy 6 sản phẩm mới nhất
        $products = Product::where('is_active', 1)->latest()->take(6)->get();
        return view('client.index', compact('topCategories', 'products'));
    }
    public function detail($id){
        // Sản phẩm chi tiết
        $product = Product::where('id', $id)->where('is_active', 1)->first();
        // Lấy 6 sản phẩm liên quan đến danh mục
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('is_active', 1)->take(6)->get();
        return view('client.detail', compact('product', 'relatedProducts'));
    }
    public function shop($category_id = null){
        // Lấy tất cả danh mục
        $categories = Category::where('is_active', 1)->withCount(['products' => function($query) {
            $query->where('is_active', 1);
        }])->get();

        //Tính tổng sản phẩm
        $totalProducts = Product::where('is_active', 1)->count();

        if ($category_id) {
            $products = Product::where('category_id', $category_id)->where('is_active', 1)->paginate(6);
        } else {
        // Lấy tất cả sản phẩm và phân trang
        $products = Product::where('is_active', 1)->paginate(6);
        }

        return view('client.shop', compact('products', 'categories', 'totalProducts'));
    }
}
