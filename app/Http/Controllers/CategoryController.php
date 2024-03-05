<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.create');
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
            'categorie_name' => ['required', 'string', 'max:300'],
        ]);

        $category = Category::create([
            'user_categorie_id' => Auth::user()->id_user,
            'categorie_name' => $request->categorie_name,
        ]);

        if ($category) {
            return redirect()->route('categories.list')->with('success', 'la categoría ha sido creada');
        } else {
            return redirect()->route('create_category')->with('wrong', 'La categoría no se a creado');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categorie_name' => ['required', 'string', 'max:300'],
        ]);

        $category = Category::where('id_categorie', $id)->update([
            'categorie_name' => $request->categorie_name
        ]);

        if ($category) {
            return back()->with('success', 'categoría actualizada');
        } else {
            return back()->with('wrong', 'categoría actualizada');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id_categorie', $id)->delete();
        if ($category) {
            return back()->with('success', 'categoría eliminada');
        } else {
            return back()->with('wrong', 'error al eliminar');
        }
    }

    public function getAllCategories()
    {
        $categories = Category::orderBy('id_categorie', 'desc')->get();
        return view('categories.category_list', compact('categories'));
    }
}
