<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'username', 'password', 'first_name',
        'last_name', 'relationship', 'address',
        'email', 'phone', 'image'


    ];

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function report()
    {
        return $this->hasMany('App\Report');
    }

    public function payment_log()
    {
        return $this->hasMany('App\Payment_log');
    }


    // public function room()
    // {
    //     return $this->belongsTo('App\Room');
    // }
}