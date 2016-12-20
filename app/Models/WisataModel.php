<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class WisataModel extends Model
{
    use CrudTrait;

    protected $table = 'wisata';

	protected $guarded = ['id'];

	protected $primaryKey = "id";

	public function city(){
        return $this->belongsTo('App\Models\CitiesModel','id_city','id');
        // return $this->hasOne('App\Models\ProvincesModel','id','id_province');
    }

    public function deleteImage($id)
    {
        $image[] = 'image/wisata/original/'.self::find($id)->logo;
        $image[] = 'image/wisata/thumb/'.self::find($id)->logo;
        $disk = "uploads";
        foreach($image as $img){
            \Storage::disk($disk)->delete($img);
        }
    }

    public function getImage(){
        return '<img src="'.\GlobalHelper::getImage($this->image,'uploads/image/wisata/thumb/').'" />';
    }

    public function uploadImage($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "image/wisata";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->logo);

            // set null in the database column
            $return = 'uploads/not-found.jpg';
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
            $return = str_replace(url('uploads/'.$destination_path.'/original').'/', '', $value);
        }

        return $return?$return:'';
    }
}
