<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';

    protected $fillable = ['name', 'email', 'amount', 'razorpay_payment_id', 'status'];
}
