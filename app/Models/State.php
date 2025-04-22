<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'states';
    protected $primaryKey = 'state_id';

    protected $fillable = ['state_name'];

    public function cities() {
        return $this->hasMany(City::class);
    }
}
