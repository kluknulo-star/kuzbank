<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $homeRoleRoute = [
            1 => 'client.home',
            2 => 'worker.home',
            3 => 'admin.users.index'
        ];


        if(auth()->user()->role_id > 0 && auth()->user()->role_id <= 3)
        {
            return redirect()->route($homeRoleRoute[auth()->user()->role_id]);
        }


        return view('home');
    }
}
