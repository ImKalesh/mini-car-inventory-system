<?php

namespace App;

use App\Manufacturer;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table="abd_models";
    protected $fillable=['manufacturer_id','name'];

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class,'id','manufacturer_id');
    }
}
