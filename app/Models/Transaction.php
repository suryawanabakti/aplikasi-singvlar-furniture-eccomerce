<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
