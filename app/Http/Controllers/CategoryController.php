<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryList = CategoryModel::all();
        return view('pages.category')
                ->with('categories', $categoryList);
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
            'categoryname' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->to('/category')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            CategoryModel::create([
                'description'=> $request->categoryname,
                'status' => CategoryModel::STATUS['active']
            ]);
            Session::flash('success', 'Category registered successfully!');
            return redirect()->to('/category');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            // return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = CategoryModel::find($id);
        return view('pages.categoryDetail')
                ->with('category', $category);
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
            'productname'=> 'required|string',
            'status'=>'required|string'
        ]);
        try {
            CategoryModel::where('id', $id)
                        ->update([
                            'description'=> $request->productname,
                            'status'=> (integer) $request->status
                        ]);
            return redirect()->to('/category');  
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()
                ->to('/category')
                ->withErrors($th->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoryModel::find($id);
        if ($category) {
            try {
                $category->delete();
                Session::flash('success', 'Category deleted successfully!');
                return redirect()->to('/category');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                return redirect()
                ->to('/category')
                ->withErrors(preg_replace('/\([^)]*\)/', '', $th->getMessage()))
                ->withInput();
            }     
        } else {
            return redirect()
                ->to('/category')
                ->withErrors('Category not found')
                ->withInput();
        }
    }
}
