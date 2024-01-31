<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katagori_pekerjaan extends Model
{
    protected $table = 'katagori_pekerjaan';

    protected $guarded = [];

    public function loker()
    {
        return $this->hasMany(Loker::class, 'katagori_pekerjaan_id'); 
    }

    

}
