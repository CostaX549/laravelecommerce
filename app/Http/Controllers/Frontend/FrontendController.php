<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

use App\Models\Category;
use App\Models\Product;
class FrontendController extends Controller
{
    public function index () {

        $search = request('search');
        if($search) {
            $products = Product::where('name', 'like', '%'.$search.'%')->get();
            return view('frontend.index', compact('products', 'search'));
        } else {
            $sliders = Slider::where('status', '0')->get();
            $products = Product::where('status', '0')->where('trending', '1')->get();
      
       
            return view('frontend.index', compact('sliders', 'products', 'search'));
        }
    
    }

    public function categories() {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug) {
        $category = Category::where('slug', $category_slug)->first();
        if($category) {
         return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug) {
        $category = Category::where('slug', $category_slug)->first();
        if($category) {
                   
       $product  = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
       
       if($product) {
        return view('frontend.collections.products.view', compact('product','category'));
       }
       else {
        return redirect()->back();
    }
       
        } else {
            return redirect()->back();
        }

    }
}
