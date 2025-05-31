<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonyPermission extends Model
{
    protected $table = 'testimony_permissions';

    protected $fillable = ['user_id', 'product_id', 'is_used'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
