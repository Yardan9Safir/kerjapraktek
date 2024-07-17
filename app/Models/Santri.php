<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nomor_induk', 'nama', 'nama_wali', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'tahun_masuk'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tahun_masuk' => 'integer',
    ];
}
