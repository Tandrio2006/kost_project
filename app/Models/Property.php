<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'name_property',
        'proyek_id',
        'blok',
        'no',
        'lb',
        'lt',
        'property_status_id',
        'selling_date',
        'customer_id',
        'salesperson_id',
        'pricelist_price',
        'selling_price',
        'payment_method_id',
        'paid_price',
        'paid_percentage'
    ];

    protected $with = ['propertyStatus', 'salesperson', 'paymentMethod'];

    public function propertyStatus()
    {
        return $this->belongsTo(PropertyStatus::class)->withDefault();
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class)->withDefault();
    }

    public function salesperson()
    {
        return $this->belongsTo(Customer::class, 'salesperson_id')->withDefault();
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'salesperson_id');
    }
}

