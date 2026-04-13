<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'bank_id',
        'category_id',
        'date',
        'description',
        'type',
        'amount',
        'balance'
    ];

    /**
     * Relationship: Transaction belongs to Bank
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Relationship: Transaction belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}