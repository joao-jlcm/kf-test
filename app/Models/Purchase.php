<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function purchaseTransaction()
    {
        return $this->hasOne(Transaction::class)->ofType('purchase');
    }

    public function refundTransaction()
    {
        return $this->hasOne(Transaction::class)->ofType('refund');
    }
}
