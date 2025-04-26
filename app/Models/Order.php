<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable, HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = ['item_id','vendor_id','customer_id','quantity','order_status','order_date','delivery_date','total_amount'];
    public function foodItem()
    {
        return $this->belongsTo(FoodItems::class, 'item_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
