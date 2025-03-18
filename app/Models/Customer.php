<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'name',
        'company_name',
        'title',
        'no_ktp',
        'alias',
        'no_hp',
        'no_hp2',
        'email',
        'customer_type_id',
        'unit',
        'salesperson_id',
        'keywords',
        'notes',
    ];

    protected $casts = [
        'keywords' => 'array',
    ];

    protected $with = ['customerType', 'salesperson'];

    /**
     * Relasi ke tipe pelanggan (customer_type).
     */
    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    /**
     * Relasi ke salesperson (self-referencing relationship).
     */
    public function salesperson()
    {
        return $this->belongsTo(Customer::class, 'salesperson_id')->withDefault();
    }

    /**
     * Relasi ke pelanggan yang memiliki salesperson ini.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'salesperson_id');
    }

    /**
     * Scope untuk pencarian customer.
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('no_hp', 'LIKE', "%{$keyword}%")
            ->orWhere('company_name', 'LIKE', "%{$keyword}%");
    }

    public function customerUnits()
    {
        return $this->hasMany(CustomerUnits::class);
    }
}
