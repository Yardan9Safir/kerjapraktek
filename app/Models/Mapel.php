<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    ['nama','keterangan','ekstrakulikuler'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ekstrakulikuler' => 'boolean',
    ];
}
