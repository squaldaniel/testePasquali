<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductsModel::with('category')->get();
        $categories = CategoryModel::all();
        return view('pages.products')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productname' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->to('/products')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            ProductsModel::create([
                'name' => $request->productname,
                'status' => (int) $request->status,
                'category_id' => (int) $request->category,
            ]);
            Session::flash('success', 'Product registered successfully!');
            return redirect()->to('/products');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()
                ->to('/products')
                ->withErrors(preg_replace('/\([^)]*\)/', '', $th->getMessage()))
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = ProductsModel::where('id', $id)
            ->with('category')->get();
        $categoryList = CategoryModel::all();
        return view('pages.productsDetail')
            ->with([
                'product' => $product[0] ?? $product[0],
                'categories' => $categoryList
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "productname" => 'required|string',
            "category" => 'required|string',
            "status" => 'required|string',
        ]);
        try {
            ProductsModel::where('id', $id)
                ->update([
                    'name' => $request->productname,
                    'status' => (int) $request->status,
                    'category_id' => $request->category,
                ]);
            return redirect()->to('/products');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = ProductsModel::find($id);
        if ($product) {
            try {
                $product->delete();
                Session::flash('success', 'Product deleted successfully!');
                return redirect()->to('/products');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                return redirect()
                    ->to('/products')
                    ->withErrors(preg_replace('/\([^)]*\)/', '', $th->getMessage()))
                    ->withInput();
            }
        } else {
            return redirect()
                ->to('/products')
                ->withErrors('Category not found')
                ->withInput();
        }
    }
}
