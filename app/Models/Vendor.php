<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $table = 'vendors';
    protected $primaryKey = 'vendor_id';

    protected $fillable = [
        'owner_name',
        'restaurant_name',
        'mobile_number',
        'email',
        'password',
        'state',
        'city',
        'gst_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function fooditems()
    {
        return $this->hasMany(FoodItems::class);
    }
}
