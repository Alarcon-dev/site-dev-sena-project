<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resource;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use PhpParser\Node\Stmt\Return_;

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
        return view('library.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $resource = new Resource();

        $request->validate([
            'resource_title' => ['string', 'max:255'],
            'cate_resource_id' => ['string', 'max:255'],
            'resource_description' => ['string', 'max:5000'],
            // 'resource_file' => ['file', 'max:2048', 'mimes:pdf'],
            'resource_author' => ['string', 'max:255'],
            'resource_edition' => ['date', 'date_format:d-m-Y'],
            // 'resource_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $user = Auth::user();

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
        $cat = Category::all();
        if ($cat->count() > 0) {
            $categories = $cat;
        }
        $resource =  Resource::find($id);
        return view('library.edit', compact('resource'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();

        $request->validate([
            // 'resource_title' => ['string', 'max:255'],
            // 'cate_resource_id' => ['string', 'max:255'],
            // 'resource_description' => ['string', 'max:5000'],
            // // 'resource_file' => ['file', 'max:10000', 'mimes:pdf'],
            // 'resource_author' => ['string', 'max:255'],
            // 'resource_edition' => ['date', 'date_format:d-m-Y'],
            // // 'resource_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        if ($request->resource_image) {
            $image = $request->resource_image;
            if (Storage::disk('image_resource')->exists($image)) {
                Storage::disk('image_resource')->delete($image);
            }
            $image = $request->resource_image;
            if ($image->isValid()) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                Storage::disk('image_resource')->put($imageName, file_get_contents($image));
                Resource::where('id_resources', $id)->update([
                    'resource_image' => $imageName
                ]);
            }
        }


        $part = explode('/', $request->file_name);

        if ($request->file_name) {
            $path = $part[0] . '/' . $part[1];
            if (Storage::disk('file_resource')->exists($path)) {

                Storage::disk('file_resource')->delete($path);
            }
        }

        if ($request->hasFile('resource_file')) {
            $file = $request->file('resource_file');
            $filePath = $file->store('pdfs', 'file_resource');

            Resource::where('id_resources', $id)->update([
                'resource_file' => $filePath
            ]);
        }

        $resource = Resource::where('id_resources', $id)->update([
            'user_resource_id' => $user->id_user,
            'resource_title' => $request->resource_title,
            'cate_resource_id' => $request->cate_resource_id,
            'resource_description' => $request->resource_description,
            'resource_author' => $request->resource_author,
            'resource_edition' => $request->resource_edition,
        ]);


        if ($resource) {
            return back()->with('success', 'Recurso actualizado');
        } else {
            return back()->with('wrong', 'error al actualizar la recurso');
        }
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
        $resources = Resource::where('cate_resource_id', $id_categorie)->get();
        return view('library.library', compact('resources'));
    }


    public function getResourceImage($image_name)
    {
        $imageResource = Storage::disk('image_resource')->get($image_name);
        return Response($imageResource, 200);
    }

    public function downloadFile($folder, $file_name)
    {
        $path = $folder . '/' . $file_name;

        if (!Storage::disk('file_resource')->exists($path)) {
            abort(404);
        }


        $fullPath = Storage::disk('file_resource')->path($path);


        return response()->file($fullPath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $file_name . '"',
        ]);
    }
}
