<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price', 'stock'];
    
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

}



