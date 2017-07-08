<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class CategoriesModel extends Model
{
    use CrudTrait;//,Eloquence;
    //,SearchableTrait

    protected $table = 'categories';

	protected $guarded = ['id'];

	protected $primaryKey = "id";
}
