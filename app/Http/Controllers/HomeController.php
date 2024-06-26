<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use PHPUnit\Event\Test\ComparatorRegisteredSubscriber;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Publication::orderBy('id_publication', 'desc')->paginate(4);
        $publications = false;
        if ($data->count() > 0) {
            $publications = $data;
        }
        return view('home', Compact('publications'));
    }
}
