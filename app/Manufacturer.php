<?php

namespace App;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table="abd_manufacturers";
    protected $fillable=['name'];

    public function models()
    {
        return $this->hasMany(Models::class,'manufacturer_id');
    }
}
