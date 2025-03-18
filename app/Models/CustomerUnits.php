<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerUnits extends Model
{
    use HasFactory;

    protected $table = 'customer_units';

    protected $fillable = [
        'customer_id',
        'properties',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'properties');
    }
}
