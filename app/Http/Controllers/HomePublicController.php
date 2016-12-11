<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePublicController extends Controller
{
	protected $vFolder = 'page.public';
	// public function __construct()
 //    {
 //    }

    public function index(){
    	// return 'hdjhsd';
    	return view($this->vFolder . '.home');
    }
}
