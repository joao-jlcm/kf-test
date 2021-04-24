<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coop extends Model
{
    use HasFactory;

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'creating' => \App\Events\CoopCreating::class,
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function owner()
    {
        return $this->belongsTo(Brand::class);
    }

    public function hasBeenFullyFunded()
    {
        return $this->purchases->sum->amount >= $this->goal;
    }
}
