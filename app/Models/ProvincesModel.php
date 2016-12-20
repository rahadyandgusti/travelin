<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ProvincesModel extends Model
{
	use CrudTrait;

    protected $table = 'provinces';

	protected $guarded = ['id'];

	protected $primaryKey = "id";

    public function deleteImage($id)
    {
        $image[] = 'logo/city/original/'.self::find($id)->logo;
        $image[] = 'logo/city/thumb/'.self::find($id)->logo;
        $disk = "uploads";
        foreach($image as $img){
            \Storage::disk($disk)->delete($img);
        }
    }

    public function getImage(){
        return '<img src="'.\GlobalHelper::getImage($this->logo,'uploads/logo/province/thumb/').'" />';
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "uploads";
        $destination_path = "logo/province";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->logo);

            // set null in the database column
            $this->attributes[$attribute_name] = null;
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
            $this->attributes[$attribute_name] = $filename;
        }
        else if(starts_with($value, url('/'))){
            $this->attributes[$attribute_name] = str_replace(url('uploads/logo/province/original').'/', '', $value);
        }

    }

    public function setImageAttributeEdit($value)
    {
        $attribute_name = "logo";
        $disk = "uploads";
        $destination_path = "logo/province";

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
            $return = str_replace(url('uploads/logo/province/original').'/', '', $value);
        }

        return $return?$return:'';
    }
}
