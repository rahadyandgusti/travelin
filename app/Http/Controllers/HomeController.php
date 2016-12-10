<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->group == 'logum')
            return redirect()->route('bill.logum.index');
        else if(Auth::user()->group == 'sdm')
            return redirect()->route('bill.sdm.index');

        $data = [
            'breadCumb' => [
                ['link' => url('/'), 'name' => 'home']
            ],
        ];
        return view('dashboard',$data);
    }
}
