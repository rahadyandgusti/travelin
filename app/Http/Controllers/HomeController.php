<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitiesModel;
use App\Models\WisataModel;

use Illuminate\Support\Facades\DB;

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
        // $data = WisataModel::join('cities','cities.id','wisata.id_city')
                // ->join('provinces','provinces.id','cities.id_province')
                // ->select('wisata.id','wisata.name','wisata.image','cities.name as cityName','provinces.name as provinceName','wisata.description');


        $table = 'select id,name,image,cityName,provinceName,description from (select w.id,w.name,w.image,c.name as cityName,p.name as provinceName,w.description,(';
        
        if($request->get('search')){
            $d['search']    = $request->get('search');
            $search         = explode(' ',$request->get('search'));
            
            $textSearch = '(';

            $wisataName = '(case when (';
            $wisataDesc = '(case when (';
            $cityName   = '(case when (';
            $provinceName = '(case when (';
            $notFirst = false;
            foreach ($search as $key => $value) {
                if(!$notFirst){
                    $notFirst = true;
                }
                else{
                    $wisataName .= ' or';
                    $wisataDesc .= ' or';
                    $cityName   .= ' or';
                    $provinceName .= ' or';                    
                }

                $wisataName .= ' (w.name like \'%'.$value.'%\')';
                $wisataDesc .= ' (w.description like \'%'.$value.'%\')';
                $cityName   .= ' (c.name like \'%'.$value.'%\')';
                $provinceName .= ' (p.name like \'%'.$value.'%\')';

                // $textSearch .= ' wisata.name like \'%'.$value.'%\' or wisata.description like \'%'.$value.'%\' or cities.name like \'%'.$value.'%\' or provinces.name like \'%'.$value.'%\'';
            }

            $wisataName .= ') then 20 else 0 end)';
            $wisataDesc .= ') then 20 else 0 end)';
            $cityName   .= ') then 10 else 0 end)';
            $provinceName .= ') then 10 else 0 end)';
            $table .= $wisataName.'+'.$wisataDesc.'+'.$cityName.'+'.$provinceName;
            // $data->whereRaw($textSearch.')');
            // $data->selectRaw('('.$wisataName.'+'.$wisataDesc.'+'.$cityName.'+'.$provinceName.') as relevan');
        }
        else{
            $table .= '1';
        }

        $table .= ') as relevan 
        from wisata as w, cities as c, provinces as p
        where w.id_city = c.id
        and c.id_province = p.id';

        if($request->get('city')){
            // $data->where('id_city',$request->get('city'));
            $table .= ' and w.id_city = '.$request->get('city');
            $d['city'] = CitiesModel::find($request->get('city'));
        }

        $table .= ') as pariwisata where relevan > 0 order by relevan desc';

        $data = DB::select(DB::raw($table));

        $d['data'] = $data;
        return view($this->vFolder . '.search',$d);
    }

    public function getWisata($id){
        $data = WisataModel::join('cities','cities.id','wisata.id_city')
                ->join('provinces','provinces.id','cities.id_province')
                ->select('wisata.id','wisata.name','wisata.image','cities.name as cityName','provinces.name as provinceName','wisata.description')
                ->where('wisata.id',$id);

        $d['data'] = $data->first();

        return view($this->vFolder . '.detail',$d);
    }
}
