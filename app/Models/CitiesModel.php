<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'cities';

	protected $guarded = ['id'];

	protected $primaryKey = "id";

	public function provinces() {
        return $this->hasOne(
            'App\Models\ProvincesModel', 
            'id', 'province_id'
        );
    } 
}
