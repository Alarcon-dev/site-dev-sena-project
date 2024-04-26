<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'comment_content' => 'required|string',
        ]);

        // Obtener el contenido del campo Summernote
        $contenido = $request->input('comment_content');

        $comment = Comment::create([
            'user_comment_id' => $user->id_user,
            'public_comment_id' => (int)$id,
            'comment_content' => $contenido,
        ]);
        // Buscar todas las etiquetas de imagen en el contenido Summernote usando una expresión regular
        preg_match_all('#src="data:image/(\w+);base64,([^"]*)"#', $contenido, $matches);

        if (!empty($matches[0])) {

            foreach ($matches[0] as $key => $match) {
                // Decodificar los datos base64 de la imagen
                $base64_img = $matches[2][$key];
                $img_extension = $matches[1][$key];
                $img_data = base64_decode($base64_img);


                $nombreImagen = uniqid() . time() . '.' . $img_extension;


                Storage::disk('comment_images')->put($nombreImagen, $img_data);

                $comment->comment_image = $nombreImagen;
                $comment->save();

                $contenido = str_replace($match, 'src="' . Storage::disk('comment_images')->url($nombreImagen) . '"', $contenido);
            }
        }

        if ($comment) {
            return redirect()->back()->with('success', 'Comentario enviado correctamente.');
        } else {
            return redirect()->back()->with('wrong', 'Error de envio de comentario.');
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
