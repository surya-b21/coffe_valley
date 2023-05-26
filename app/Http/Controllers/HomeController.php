<?php

namespace App\Http\Controllers;

use App\Models\Bean;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $bean = Bean::select('*')->first();
        return view('home', compact(['bean']));
    }

    public function catalogue(Request $request)
    {
        if ($request->ajax()) {
            $data = Bean::select('*');
            return DataTables::of($data)
                ->make(true);
        }

        return view('catalogue');
    }
}
