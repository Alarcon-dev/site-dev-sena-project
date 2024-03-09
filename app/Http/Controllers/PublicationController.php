<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('publications.create_publication', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'cate_public_id' => ['string', 'max:255'],
            'public_title' => ['string', 'max:255'],
            'public_content' => ['string', 'max:5000'],
            'public_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $publication = Publication::create([
            'user_public_id' => (int)$user->id_user,
            'cate_public_id' => (int)$request->cate_public_id,
            'public_title' => $request->public_title,
            'public_content' => $request->public_content,
        ]);

        if (!empty($request->public_image) && $request->public_image->isValid()) {
            $image = $request->public_image;
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::disk('publications')->put($imageName, file_get_contents($image));

            $publication->public_image = $imageName;

            $publication->save();
        }

        if ($publication) {
            return redirect()->route('home')->with('success', 'se a agregado una nueva publicación');
        } else {
            return back()->with('wrong', 'error de publicación');
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
        $publication = Publication::find($id);
        $categories = Category::all();
        return view('publications.edit_publication', compact('publication'), compact('categories'));
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

    public function getPublicationImage($image_name)
    {
        $publication_image = Storage::disk('publications')->get($image_name);

        return Response($publication_image, 200);
    }

    public function getPublicationProfile($image_name)
    {
        $publication_profile = Storage::disk('user_profile')->get($image_name);

        return Response($publication_profile, 200);
    }

    public function getAllPublications()
    {
        $publications = Publication::all();

        return $publications;
    }
}
