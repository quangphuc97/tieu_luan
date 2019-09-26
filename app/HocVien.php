<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    protected $table = 'hoc_vien';
    protected $primaryKey = 'id_hoc_vien';
    protected $guarded = ['id_khach_hang'];
    protected $fillable     = ['id_hoc_vien','username','password','ho_ten','dia_chi','sdt','email'];
}
