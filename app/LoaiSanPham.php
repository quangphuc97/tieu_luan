<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = 'loai_san_pham';
    protected $primaryKey = 'ma_loai';
    protected $guarded = ['ma_loai'];
    protected $fillable     = ['ma_loai','ten_loai'];

    public function sanpham()
    {
        return $this->hasMany('App\SanPham', 'ma_loai', 'ma_loai');
    }
}
