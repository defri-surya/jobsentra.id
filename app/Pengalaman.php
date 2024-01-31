<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalamen';

    protected $fillable = [
        'user_id',
        'pencaker_id',
        'posisi',
        'nama_perusahaan',
        'tgl_mulai',
        'tgl_akhir',
    ];
}
