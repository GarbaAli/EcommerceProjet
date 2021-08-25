<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('administration.product.listProduct', compact('products'));
    }

    public function createNew()
    {
        return view('administration.product.createProduct');
    }


    public function create(Request $request)
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
            'image' => ['required'],
        ],$messages);
        // $path = $request->file('image')->store('public/product');
        // $path1 = $request->file('image_detail')->store('public/images');
        // DD($path);exit();
        $produit = Product::create([
            'slug' => $request->input('slug'),
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'description' => request('description'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'image_detail' => $request->input('image_detail'),
        ]);
        $produit->save();
        return redirect('admin/product/list')->with('status','etudiant creer avec success');

    }

    public function updateNew(int $id)
    {
        $produit = Product::find($id);
        return view('administration.product.createProduct',compact('produit'));
    }

    public function update(Request $request, Product $id)
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
        // $request->image->store('public/product');
        // $request->image_detail->store('public/product');
        // $image=  $request->image->hashName();

        // $image_detail= $request->image_detail->hashName();
        $id->update([
                'slug' => $request->input('slug'),
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'description' => request('description'),
                'price' => $request->input('price'),
                'image' => $request->input('image'),
                'image_detail' => $request->input('image_detail')
        ]);

        return redirect('admin/product/list')->with('status','etudiant creer avec success');
    }

    public function delete(int $id)
    {
        Product::destroy($id);
        $products = Product::all();
        return view('administration.product.listProduct', compact('products'));

    }

    public function detail(int $id)
    {
        $product = product::find($id);
        return view('administration.product.detailProduct', compact('product'));

    }

}
