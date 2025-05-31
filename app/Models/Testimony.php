<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimonies';

    protected $fillable = ['user_id', 'product_id', 'testimony', 'rating', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
