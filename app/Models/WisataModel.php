<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataModel extends Model
{
    protected $table = 'wisata';

	protected $guarded = ['id'];

	protected $primaryKey = "id";
}
