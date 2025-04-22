<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class FoodItems extends Model
{
    use Notifiable, HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $table = 'fooditems';
    protected $primaryKey = 'item_id';
    protected $fillable = ['vendor_id', 'name', 'price', 'image_path'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
