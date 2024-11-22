<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('images')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

         $category = Category::create([
            'name' => $request->name,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('category_images', 'public');
                $category->images()->create(['path' => $path]);
            }
        }

        return to_route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('category_images', 'public');
                $category->images()->create(['path' => $path]);
            }
        }

        return to_route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Delete a specific image of the category.
     */
    public function destroyCategoryImage(Category $category, Image $image)
    {
        // Ensure the image belongs to the category
        if ($image->imageable_id !== $category->id || $image->imageable_type !== Category::class) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the image file from storage
        if (Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }

        // Delete the image record from the database
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         if ($category->posts()->exists()) {
            // Optionally handle reassignment or deletion of the related posts
            $count = $category->posts()->count();
            $message = "This category has $count associated " . Str::plural('post', $count) . " and cannot be deleted.";
            return redirect()->back()->with('warning', $message);
        }
        // Delete all associated images from storage
        foreach ($category->images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete(); // Delete the image record from the database
        }

        // Delete the category
        $category->delete();

        return to_route('categories.index')->with('success', 'Category and associated images deleted successfully.');
    }
}
