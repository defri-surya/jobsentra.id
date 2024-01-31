<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencaker extends Model
{
    protected $table = 'pencakers';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'tgl_lahir',
        'tmpt_lahir',
        'foto',
        'about',
        'email',
        'ig',
        'fb',
        'linkedin',
        'no_hp',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    // public function user()
    // {
    //     return $this->hasOne(User::class, 'user_id','id');
    // }

    public function skill()
    {
        return $this->hasMany(Keahlian::class, 'pencaker_id', 'id');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'pencaker_id', 'id');
    }

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class, 'pencaker_id', 'id');
    }

    public function assesmen()
    {
        return $this->hasMany(Assesmen::class, 'pencaker_id', 'id');
    }
}
