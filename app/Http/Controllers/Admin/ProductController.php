<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Product::latest()->paginate(5);

        return view('administration.product.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('administration.product.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'slug.required' => "le slug est obligatoire",
            'title.required' => "le titre est obligatoire",
            'subtitle.required' => "le sous titre est obligatoire",
            'description.required' => "la description du produit est obligatoire",
            'price.required' => "le prix est obligatoire",
            'image.required' => "l'image est obligatoire",
            'image_detail.required' => "l'image second est obligatoire",
        ];

        $request->validate([
            'slug' => ['required', 'string', 'unique:products'],
            'title' => ['required', 'string','unique:products'],
            'subtitle' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required','integer'],
            'image' => ['required'],
            'image_detail' => ['required'],
        ],$messages);

        try {
            Product::create($request->all());
            return redirect()->route('admin::products.index')
                        ->with('success','Product created successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin::products.index')
                        ->with('success','ce produit existe déjà');
        }


    }

    public function show(Product $product)
    {
        return view('administration.product.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view('administration.product.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $messages = [
            'slug.required' => "le slug est obligatoire",
            'title.required' => "le titre est obligatoire",
            'subtitle.required' => "le sous titre est obligatoire",
            'description.required' => "la description du produit est obligatoire",
            'price.required' => "le prix est obligatoire",
            'image.required' => "l'image est obligatoire",
            'image_detail.required' => "l'image second est obligatoire",
        ];

        $request->validate([
            'slug' => ['required', 'string', 'unique:products'],
            'title' => ['required', 'string','unique:products'],
            'subtitle' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required','integer'],
            'image' => ['required'],
            'image_detail' => ['required'],
        ],$messages);

        try {
            $product->update($request->all());
            return redirect()->route('admin::products.index')
                        ->with('success','product updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin::products.index')
                        ->with('success','ce produit existe déjà');
        }


    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin::products.index')
                        ->with('success','product deleted successfully');
    }
}
