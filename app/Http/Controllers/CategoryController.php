<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryCreate(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $category =$request->input('category_name');

        Category::create(['category_name' => $category]);

        return response()->json('Category Created Successfully', 200);
    }

    public function CategoryUpdate(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $category_id = $request->input('id');
        $category_name = $request->input('category_name');

        Category::where('id', $category_id)->update(['category_name' => $category_name]);

        return response()->json('Category Updated Successfully', 200);
    }

    public function CategoryDelete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $category_id = $request->input('id');
        Category::where('id', $category_id)->delete();
        return response()->json('Category Deleted Successfully', 200);
    }

    public function CategoryList()
    {
        $category = Category::all();
        return response()->json($category, 200);
    }

    public function CategoryListByID(Request $request)
    {
        $category_id = $request->input('id');
        $category = Category::where('id', $category_id)->get();
        return response()->json($category, 200);
    }
}
