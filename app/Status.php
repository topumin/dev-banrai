<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = [
        'name'


    ];

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
