<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //添加软删除属性
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //对应的表
    protected $table = 'articles';

    //通过model可以写入的字段
    protected $fillable = [
        'title','content',
    ];
}
