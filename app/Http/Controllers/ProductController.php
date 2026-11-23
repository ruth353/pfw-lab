<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource using Query Builder.
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->paginate(10);

        return view('guest.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = DB::table('categories')->pluck('name', 'id');
        return view('guest.products.create', compact('categories'));
    }

    /**
     * Store a newly created product using Query Builder.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        DB::table('products')->insert($validated);

        return redirect()->route('guest.products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('categories')->pluck('name', 'id');
        return view('guest.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product using Query Builder.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        DB::table('products')->where('id', $id)->update($validated);

        return redirect()->route('guest.products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product.
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('guest.products.index')
            ->with('success', 'Product deleted');
    }
}
?>