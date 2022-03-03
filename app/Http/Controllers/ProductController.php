<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $slug = Str::slug("Iphone 13 Max Pro");
        $max = Product::whereName("Iphone 13 Max Pro")->latest('id')->first();
        if ($max) {
            $slug = $slug . '-' . $max->id + 1;
        }

        $product = Product::create([
            "name" => "Iphone 13 Max Pro",
            "slug" => $slug,
            "description" => "This is just for laravel slug example"
        ]);
        dd($product);
    }
}
