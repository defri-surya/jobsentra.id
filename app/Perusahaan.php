<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaans';

    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'logo',
        'alamat',
        'about',
        'location',
        'kontak',
        'status',
    ];

    public function loker()
    {
        return $this->hasMany(Loker::class, 'company_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
