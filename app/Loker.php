<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'lokers';

    protected $guarded = [];
    // protected $fillable = [
    //     'user_id',
    //     'company_id',
    //     'katagori_pekerjaan_id',
    //     'kode_loker',
    //     'judul',
    //     'status_kerja',
    //     'pendidikan_min',
    //     'jurusan',
    //     'lokasi',
    //     'tgl_mulai',
    //     'tgl_akhir',
    //     'skor',
    //     'deskripsi',
    //     'status',
    //     'status_company',
    // ];

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id', 'company_id');
    }

    public function katagori_pekerjaan()
    {
        return $this->belongsTo(Katagori_pekerjaan::class);
    }

    // public function katagori_pekerjaan()
    // {
    //     return $this->hasOne(Katagori_pekerjaan::class, 'id', 'katagori_pekerjaan_id');
    // }



}
