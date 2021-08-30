<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Category::latest()->paginate(5);

        return view('administration.category.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('administration.category.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required','unique:categories'
        ]);

        try {
            Category::create($request->all());
            return redirect()->route('admin::categories.index')
                        ->with('success','Category created successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin::categories.index')
                        ->with('success','cette catégorie existe déjà');
        }


    }

    public function show(Category $category)
    {
        return view('administration.category.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('administration.category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {
            $category->update($request->all());
            return redirect()->route('admin::categories.index')
                        ->with('success','category updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin::categories.index')
                        ->with('success','cette catégorie existe déjà');
        }


    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin::categories.index')
                        ->with('success','category deleted successfully');
    }
}
