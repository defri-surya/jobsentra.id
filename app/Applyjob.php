<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applyjob extends Model
{
    protected $table = 'applyjobs';

    protected $guarded = [];

    public function loker()
    {
        return $this->hasMany(Loker::class, 'company_id');
    }
}
