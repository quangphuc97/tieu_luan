<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = 'anh';
    public $timestamps = false;
    protected $primaryKey = 'ma_anh';
    protected $fillable     = ['ma_san_pham','dia_chi','ma_anh'];
    protected $guarded      = ['ma_anh'];
}
