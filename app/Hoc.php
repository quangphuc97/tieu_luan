<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 10/2/2019
 * Time: 12:49 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Hoc extends Model
{
    protected $table = 'hoc';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable     = ['id','ma_lop','id_hoc_vien','trang_thai'];
    public static $trang_thai_xu_ly ="Đang xử lý";
    public static $trang_thai_duyet ="Duyệt";
    public function hocvien()
    {
        return $this->belongsTo('App\HocVien','id_hoc_vien','id_hoc_vien');
    }

    public function lop()
    {
        return $this->belongsTo('App\Lop','ma_lop','ma_lop');
    }
}