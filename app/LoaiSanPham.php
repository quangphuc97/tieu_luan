<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $primaryKey = 'ma_loai';
    protected $table = 'loai_san_pham';
public function sanpham()
{
    return $this->hasMany('App/Sanpham','ma_loai','ma_loai');
}
}
