<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    public $timestamps = false;
    protected $table = 'giao_vien';
    protected $primaryKey = 'id_giao_vien';
    protected $guarded = ['id_giao_vien'];
    protected $fillable     = ['id_giao_vien','anh_dai_dien','username','password','ho_ten','dia_chi','sdt','email'];
}
