<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory , softDeletes;

    protected $fillable = ['sku','user_id', 'category_id', 'name', 'description', 'price','quantity'];

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id')->withTrashed();
    }

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
