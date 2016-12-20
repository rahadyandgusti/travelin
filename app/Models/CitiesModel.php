<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

//use Nicolaslopezj\Searchable\SearchableTrait;

// use Sofa\Eloquence\Eloquence;

class CitiesModel extends Model
{
	use CrudTrait;//,Eloquence;
    //,SearchableTrait

    protected $table = 'cities';

	protected $guarded = ['id'];

	protected $primaryKey = "id";


    public function province(){
        return $this->belongsTo('App\Models\ProvincesModel','id_province','id');
        // return $this->hasOne('App\Models\ProvincesModel','id','id_province');
    }

    public function wisata(){
        return $this->hasMany('App\Models\WisataModel','id_city','id');
        // return $this->hasOne('App\Models\ProvincesModel','id','id_province');
    }

    // public static function search($s){
    //     return self:://select('cities.id','cities.name as text','cities.logo')
    //     // ->groupBy('id','id_province','provinces.name','cities.logo','cities.name','cities.description','cities.slide','cities.created_at','cities.updated_at','cities.created_id','cities.updated_id')
    //     // ->
    //     search($s)
    //     // ->with('provinces')
    //     ;
    // }

    public function deleteImage($id,$param)
    {
        if($param == 'logo'){
            $image[] = 'logo/city/original/'.self::find($id)->logo;
            $image[] = 'logo/city/thumb/'.self::find($id)->logo;
        }
        else{
            $image[] = 'slide/city/'.self::find($id)->slide;
        }
        $disk = "uploads";
        foreach($image as $img){
            \Storage::disk($disk)->delete($img);
        }
    }

    public function getImage(){
        return '<img src="'.\GlobalHelper::getImage($this->logo,'uploads/logo/city/thumb/').'" />';
    }


    public function uploadSlide($value)
    {
        $attribute_name = "logo";
        $disk = "uploads";
        $destination_path = "slide/city";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);

            // set null in the database column
            $return = '';
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->resize(1366,500);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            @chmod($destination_path.'/'.$filename, 0777);

            // 3. Save the path to the database
            $return = $filename;
        }
        else if(starts_with($value, url('/'))){
            $return = str_replace(url($destination_path).'/', '', $value);
        }
        return $return?$return:'';
    }

    public function uploadLogo($value)
    {
        $attribute_name = "logo";
        $disk = "uploads";
        $destination_path = "logo/city";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->logo);

            // set null in the database column
            $return = '';
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value);
            $imageThumb = \Image::make($value)->resize(30,null,function($c){$c->aspectRatio();});
            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/original/'.$filename, $image->stream());
            @chmod($destination_path.'/original/'.$filename, 0777);
            \Storage::disk($disk)->put($destination_path.'/thumb/'.$filename, $imageThumb->stream());
            @chmod($destination_path.'/thumb/'.$filename, 0777);

            // 3. Save the path to the database
            $return = $filename;
        }
        else if(starts_with($value, url('/'))){
            $return = str_replace(url('uploads/logo/city/original').'/', '', $value);
        }

        return $return?$return:'';
    }

    // private function mySearchable($search){
    //     $table = 'cities as c,provinces p';
    //     $relation = 'c.id_province=p.id';
    //     $select = 'c.id,c.name as text,p.name,c.logo';
    //     $searchable = ['c.name','p.name'];
    //     $hasil = DB::select(DB::raw('select '.$select.' from '.$table.' where '.$relation.''))

    // }
}
