<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'user_id');
    }

    public function order()
    {
        $this->belongsTo(Order::class,'order_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
