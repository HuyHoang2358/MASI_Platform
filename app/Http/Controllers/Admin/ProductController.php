<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Product,
    Size,
    Category,
    Color
};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with(['category'])->get();
        return view('admin.product_management', ['page' => 'product' ,'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::where('parent_id', null)->where('type', 'product-cate')->get();

        return view('admin.partials.product.addProductForm', ['page' => 'product', 'categories' => $categories, 'sizes' =>  $sizes, 'colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            // Create the product
            $product = Product::create([
                'category_id' => $request->input('category'),
                'images' => $request->input('product-thumbnail'),
                'name' => $request->input('product-name'),
                'slug' => $request->input('product-slug'),
                'quantity' => $request->input('product-quantity'),
                'stock' => $request->input('product-stock'),
                'price' => $request->input('product-price'),
                'cost' => $request->input('product-cost'),
                'description' => $request->input('product-description'),
            ]);

            // Attach colors and sizes to the product
            $product->colors()->attach($request->input('product-color'));
            $product->sizes()->attach($request->input('product-size'));

            // Flash success message
            return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            // Flash error message
            return redirect()->route('admin.product.index')->with('error', 'An error occurred while creating the product: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::with(['sizes', 'colors', 'category'])->findOrFail($id);

        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::where('parent_id', null)->where('type', 'product-cate')->get();

        return view('admin.partials.product.updateProductForm', [
            'product' => $product,
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors,
            'page' => 'product'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
            // Find the product by ID
            $product = Product::findOrFail($request->input('id'));

            // Update the product fields
            $product->category_id = $request->input('category');
            $product->images = $request->input('product-thumbnail');
            $product->name = $request->input('product-name');
            $product->slug = $request->input('product-slug');
            $product->quantity = $request->input('product-quantity');
            $product->stock = $request->input('product-stock');
            $product->price = $request->input('product-price');
            $product->cost = $request->input('product-cost');
            $product->description = $request->input('product-description');

            $colorsSynced = $product->colors()->sync($request->input('product-color'));
            $sizesSynced = $product->sizes()->sync($request->input('product-size'));

            // Check if there are any changes
            if ($product->isDirty() || !empty($colorsSynced['attached']) || !empty($colorsSynced['detached']) || !empty($colorsSynced['updated']) || !empty($sizesSynced['attached']) || !empty($sizesSynced['detached']) || !empty($sizesSynced['updated'])) {
                // Save the updated product
                $product->save();

                // Flash success message
                return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công.');
            } else {
                // Flash info message if no changes
                return redirect()->route('admin.product.index')->with('info', 'Không có thay đổi nào được thực hiện.');
            }
        } catch (\Exception $e) {
            // Flash error message
            return redirect()->route('admin.product.index')->with('error', 'An error occurred while updating the product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        try {
            // Find the product by ID
            $product = Product::findOrFail($request->input("del-product-id"));

            // Delete the product
            $product->delete();

            // Flash success message
            return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm thành công.');
        } catch (\Exception $e) {
            // Flash error message
            return redirect()->route('admin.product.index')->with('error', 'An error occurred while deleting the product: ' . $e->getMessage());
        }
    }
}
