<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersModel extends Model
{
	use SoftDeletes;

    protected $table = 'users';

	protected $guarded = ['id'];

	protected $primaryKey = "id";

	protected $dates = ['deleted_at'];
}
