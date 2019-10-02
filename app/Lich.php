<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 10/2/2019
 * Time: 12:55 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Lich extends Model
{
    protected $table = 'lich';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable     = ['id','ma_lop','bat_dau','ket_thuc'];

    public function lop()
    {
        return $this->belongsTo('App\Lop','ma_lop','ma_lop');
    }
}