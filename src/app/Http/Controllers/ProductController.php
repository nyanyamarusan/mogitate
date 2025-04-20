<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->paginate(6);

        return view('index', compact('products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword', '');
        $sortDirection = $request->input('sort_direction', 'desc');
        $products = Product::with('seasons');
        if ($request->isMethod('POST')) {
            $products = $products->keywordSearch($keyword);
            if (in_array($sortDirection, ['asc', 'desc'])) {
                $products = $products->orderBy('price', $sortDirection);
            }
        }
        if ($request->isMethod('GET')) {
            $keyword = '';
            $sortDirection = '';
        }

        $products =  $products->paginate(6);

        return view('index', compact('products', 'keyword', 'sortDirection'));
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $seasons = Season::all();

        return view('edit', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $productData = $request->only
        ([
            'name',
            'description',
            'price',
            'seasonId',
        ]);
        $imagePath = $request->file('image')->store('fruits-img', 'public');
        $productData['image'] = basename($imagePath);
        if ($product->image) {
            $imagePath = 'fruits-img/' . $product->image;
            Storage::disk('public')->delete($imagePath);
        }
        $product->update($productData);
        $seasons = $request->input('seasonId', []);
        $product->seasons()->sync($seasons);

        return redirect('/products');
    }

    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        $product->seasons()->detach();
        if ($product->image) {
            $imagePath = 'fruits-img/' . $product->image;
            Storage::disk('public')->delete($imagePath);
        }
        $product->delete();

        return redirect('/products');
    }

    public function create()
    {
        $product = new Product();
        $seasons = Season::all();

        return view('register', compact('product', 'seasons'));
    }

    public function store(ProductRequest $request)
    {
        $productData = $request->only
        ([
            'name',
            'description',
            'price',
            'seasonId',
        ]);
        $imagePath = $request->file('image')->store('fruits-img', 'public');
        $productData['image'] = basename($imagePath);
        $product = Product::create($productData);
        $seasons = $request->input('seasonId', []);
        $product->seasons()->attach($seasons);

        return redirect('/products');
    }
}
