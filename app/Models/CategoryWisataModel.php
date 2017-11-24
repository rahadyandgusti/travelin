<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = 'category_wisata';

	protected $guarded = ['id'];

	protected $primaryKey = "id";
}
