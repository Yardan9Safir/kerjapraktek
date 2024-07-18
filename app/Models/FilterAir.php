<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterAir extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_alat', 'deskripsi_alat', 'stok_alat', 'harga_alat'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'stok_alat' => 'integer',
    ];
}
