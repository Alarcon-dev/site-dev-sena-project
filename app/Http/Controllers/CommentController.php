<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DOMDocument;
use GuzzleHttp\Psr7\Response;
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

        $request->validate([
            'comment_content' => ['string', 'max:5000'],
            'comment_image.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $comment = Comment::create([
            'user_comment_id' => $user->id_user,
            'public_comment_id' => (int)$id,
            'comment_content' => $request->comment_content,
        ]);

        if ($request->hasFile('comment_image')) {

            foreach ($request->file('comment_image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    Storage::disk('comment_images')->put($imageName, file_get_contents($image));

                    $imageNames[] = $imageName;
                }
            }
            $comment->comment_image = json_encode($imageNames);
            $comment->save();
        }



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
    public function edit(string $id_comment)
    {
        $comment = Comment::find($id_comment);

        return view('comments.commentEdit', compact('comment'));
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

    public function getImageComment($image_path)
    {
        $commentImage = Storage::disk('comment_images')->get($image_path);

        return Response($commentImage, 200);
    }
}
