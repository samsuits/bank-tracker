<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
