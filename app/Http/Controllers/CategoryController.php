<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id) {
        $category = Category::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id) {
        $category = Category::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $category->delete();

        return redirect()->route('categories.index');
    }
}
