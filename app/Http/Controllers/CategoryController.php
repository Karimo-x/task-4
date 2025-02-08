<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\FileExists;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('managerUser', User::class);
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('managerUser', User::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('managerUser', User::class);
        $request->validate([
            'title' => 'required|string',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . '-' . time() . '.' .   $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/categories/'), $imageName);
        }
        Category::create([
            'title' => $request->title,
            'image' => $imageName
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $this->authorize('managerUser', User::class);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize('managerUser', User::class);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('managerUser', User::class);
        $request->validate([
            'title' => 'required|string',
        ]);
        
        if ($request->hasFile('image')) {
            $filePath = public_path('/assets/images/categories/' . $category->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $imageName = $request->file('image')->getClientOriginalName() . '-' . time() . '.' .   $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/categories/'), $imageName);
        } else {
            $imageName = $category->image;
        }
        $category->update([
            'title' => $request->title,
            'image' => $imageName
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('managerUser', User::class);
        $filePath = public_path('/assets/images/categories/' . $category->image);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $category->delete();
        return redirect()->route('categories.index');
    }
}
