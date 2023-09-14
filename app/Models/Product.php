<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $with = ['rating'];

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function rating()
    {
        return $this->hasMany(ProductRating::class);
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'user_id', 'user_id');
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
