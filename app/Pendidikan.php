<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikans';

    protected $fillable = [
        'user_id',
        'pencaker_id',
        'nama_sekolah',
        'angkatan',
        'jurusan',
    ];
}
