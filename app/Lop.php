<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 10/2/2019
 * Time: 12:42 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    public $timestamps = false;
    protected $table = 'lop';
    protected $primaryKey = 'ma_lop';
    protected $guarded = ['ma_lop'];
    protected $fillable     = ['ma_lop','ten_lop','id_giao_vien','si_so','trang_thai'];
    public static $hoat_dong="hoạt động";
    public static $khong_hoat_dong= "không hoạt động";
    public static $chua_sap_lich= "chưa xếp lịch";
    public function giaovien()
    {
        return $this->belongsTo('App\GiaoVien','id_giao_vien','id_giao_vien');
    }

    public function hoc()
    {
        return $this->hasMany('App\Hoc', 'ma_lop', 'ma_lop');
    }

    public function lich()
    {
        return $this->hasMany('App\Event', 'ma_lop', 'ma_lop');
    }
}
