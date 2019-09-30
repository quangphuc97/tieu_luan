<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 9/29/2019
 * Time: 5:49 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
class ThongBao extends Model
{
    public $timestamps = false;
    protected $table = 'thong_bao';
    protected $primaryKey = 'id';
    protected $fillable     = ['id','tieu_de','noi_dung','bat_dau','ket_thuc'];
    protected $guarded      = ['id'];
}
