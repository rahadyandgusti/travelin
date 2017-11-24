<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvincesModel extends Model
{
    protected $table = 'provinces';

	protected $guarded = ['id'];

	protected $primaryKey = "id";
}
