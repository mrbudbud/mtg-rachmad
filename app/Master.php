<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'master_item';

    protected $fillable = [
        'nama_barang', 'kode_barang', 'status'
    ];
}
