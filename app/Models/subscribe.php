<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
    use HasFactory;

    protected $table ='subscribe';

    protected $fillable=[
        'nama',
        'email',
        'phone',
        'kategori',
        'rumah_tinggal',
        'komersial',
        'luas',
        'city',
    ];
}
