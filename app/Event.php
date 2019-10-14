<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['id','title','start_date','end_date','color','ma_lop'];
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
