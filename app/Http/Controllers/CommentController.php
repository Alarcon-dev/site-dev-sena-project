<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DOMDocument;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $user = Auth::user();
        $description = $request->comment_content;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time() . $key . '.png';
            // file_put_contents(public_path() . $image_name, $data);

            Storage::disk('comment_images')->put($image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();

        $comment = Comment::create([
            'user_comment_id' => $user->id_user,
            'public_comment_id' => (int)$id,
            'comment_content' => $description,

        ]);


        if ($comment) {
            return redirect()->back()->with('success', 'Comentario enviado correctamente.');
        } else {
            return redirect()->back()->with('wrong', 'Error al enviar el comentario.');
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
}
