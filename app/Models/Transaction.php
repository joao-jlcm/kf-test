<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public static function sources()
    {
        return [
            'Check',
            'CreditCard',
            'KickfurtherCredits',
            'KickfurtherFunds',
            'Wire',
        ];
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
