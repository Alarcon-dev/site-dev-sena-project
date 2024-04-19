<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        if ($cat->count() > 0) {
            $categories = $cat;
        }
        return view('resources.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $resource = new Resource();

        $request->validate([
            'resource_title' => ['string', 'max:255'],
            'cate_resource_id' => ['string', 'max:255'],
            'resource_description' => ['string', 'max:5000'],
            'resource_file' => ['file', 'max:2048', 'mimes:pdf'],
            'resource_author' => ['string', 'max:255'],
            'resource_edition' => ['date'],
            'resource_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        if ($request->resource_image) {
            $image = $request->resource_image;
            if ($image->isValid()) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                Storage::disk('image_resource')->put($imageName, file_get_contents($image));
                $resource->resource_image = $imageName;
            }
        }

        if ($request->hasFile('resource_file')) {
            $file = $request->file('resource_file');
            $filePath = $file->store('pdfs', 'file_resource'); // Cambia 'nombre_del_disco' al nombre de tu disco personalizado
        }

        $resource->user_resource_id  = (int)$user->id_user;
        $resource->resource_title = $request->resource_title;
        $resource->cate_resource_id = (int)$request->cate_resource_id;
        $resource->resource_description = $request->resource_description;
        $resource->resource_author = $request->resource_author;
        $resource->resource_edition = $request->resource_edition;
        $resource->resource_file = $filePath;

        $resource->save();

        if ($resource) {
            return back()->with('success', 'se a agregado un nuevo recurso');
        } else {
            return back()->with('wrong', 'error al crear recurso');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function library($id_categorie)
    {

        $resource = Resource::where('cate_resource_id', $id_categorie)->get();

        return view('library.library', compact('resource'));
    }
}
