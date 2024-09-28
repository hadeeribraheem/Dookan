<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,softDeletes;

    protected $fillable=['user_id','address_id','status','total_price'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function address()
    {
        return $this->belongsTo(UserAddress::class, 'address_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
