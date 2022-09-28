<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // Show form view category
    public function createCategory()
    {
        return view('admin.addcategory');
    }

    // Save category value in database
    public function saveCategory(Request $request)
    {
        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $add = new Category();
        $add->category_name = $request->category_name;
        $add->save();

        return back()->with('success', 'Le catégorie ' . $add->category_name . ' a été enregistrer.');

    }

    // Show list the category in database
    public function showCategory()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.showcategory')->with('categories', $categories);
    }

    // Update category to database
    public function editSave(Request $request)
    {
        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $edit = Category::find($request->id);
        $edit->category_name = $request->category_name;
        $edit->update();

        return redirect('/administration/category/list')->with('success', 'La modification du catégorie a été enregistrer.');
    }

    // Show edit form view
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.editcategory')->with('category', $category);
    }

    // Show delete confirmation view
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/administration/category/list')->with('success', 'La catégorie ' . $category->category_name . ' a été supprimer.');
    }

}
