<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitiesModel;


class HomeController extends Controller
{
    protected $vFolder = 'page.public';

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $data['slides'] = CitiesModel::select('slide','name')->take(5)->get();
        return view($this->vFolder . '.home',$data);
    }

    public function searchCity(Request $request){
    	// return 'dsgs';
        $data = CitiesModel::join('provinces','provinces.id','cities.id_province')
                ->select('cities.id','cities.name as text','cities.logo','provinces.name')
                ->where('cities.name','like','%'.$request->get('q').'%')
                ->orWhere('provinces.name','like','%'.$request->get('q').'%')
                ->get()->toArray();
    	return json_encode($data);
    }

    public function search(Request $request){
        $data = CitiesModel::join('provinces','provinces.id','cities.id_province')
                ->select('cities.id','cities.name as text','cities.logo','provinces.name')
                ->where('cities.name','like','%pe%')
                // ->orWhere('provinces.name','like','%pe%')
                ->get()->toArray();
        return json_encode($data);
        return view($this->vFolder . '.search',$data);
    }
}
