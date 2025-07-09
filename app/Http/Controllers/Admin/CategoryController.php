<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $categories = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'status' => 'required|in:1,0',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $publicPath = public_path('images/categories');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $img->save($publicPath . '/' . $filename);
            $imageName = 'images/categories/' . $filename;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:1,0',
        ]);

        $imageName = $category->image;
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($category->image && file_exists(public_path($category->image))) {
                @unlink(public_path($category->image));
            }
            $image = $request->file('image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $publicPath = public_path('images/categories');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $img->save($publicPath . '/' . $filename);
            $imageName = 'images/categories/' . $filename;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // حذف صورة التصنيف من الملفات إذا كانت موجودة
        if ($category->image && file_exists(public_path($category->image))) {
            @unlink(public_path($category->image));
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'تم حذف التصنيف بنجاح.');
    }
}
