<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

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
        $event = Event::where('status', 1)->latest()->first();
        return view('schools.index', compact('event'));
    }
}
