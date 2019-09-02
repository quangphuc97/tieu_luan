<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $primaryKey = 'ma_san_pham';
    protected $table = 'san_pham';
//    public $timestamps = false;
    public function loaisanpham()
    {
        return $this->belongsTo('App/Loaisanpham','ma_loai','ma_loai');
    }
}
