<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'total',
        'status',
    ];

    // Khai báo quan hệ với OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
