<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
     public function index()
    {
            $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(770, 513, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $watermarkPath = public_path('watermark.png');
            if (file_exists($watermarkPath)) {
                $img->insert($watermarkPath, 'bottom-right', 10, 10);
            }
            $publicPath = public_path('imges/prodecuts');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $img->save($publicPath . '/' . $filename);
            $imageName = 'imges/prodecuts/' . $filename;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

        public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file('image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(770, 513, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $watermarkPath = public_path('watermark.png');
            if (file_exists($watermarkPath)) {
                $img->insert($watermarkPath, 'bottom-right', 10, 10);
            }
            $publicPath = public_path('imges/prodecuts');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $img->save($publicPath . '/' . $filename);
            $product->image = 'imges/prodecuts/' . $filename;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

}
