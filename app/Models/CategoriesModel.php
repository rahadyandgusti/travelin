<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Laravel\Scout\Searchable;

class CategoriesModel extends Model
{
    use CrudTrait,Searchable;

    protected $table = 'categories';

	protected $guarded = ['id'];

	protected $primaryKey = "id";
}
