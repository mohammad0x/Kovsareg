<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use HasFactory;

    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'admins';
//    protected $guard = 'admin';
    protected $fillable = [
        'mobile', 'password'
    ];
    protected $hidden = [
        'password',
    ];

    public function advertisings()
    {
        return $this->hasMany(Advertising::class);
    }
}
