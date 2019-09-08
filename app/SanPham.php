<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'ma_san_pham';
    protected $fillable     = ['ma_san_pham','ten_san_pham','dien_giai','gia','ma_loai','anh_dai_dien'];
    protected $guarded      = ['ma_san_pham'];
    public function loaisanpham()
    {
        return $this->belongsTo('App\LoaiSanPham','ma_loai','ma_loai');
    }
}
