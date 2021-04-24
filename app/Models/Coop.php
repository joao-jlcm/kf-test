<?php

namespace App\Models;

use App\Mail\CoopCancellation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Coop extends Model
{
    const STATUS_CANCELLED = 'cancelled';

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

    public function cancel()
    {
        if ($this->status == 'cancelled')
            return;
        
        DB::transaction(function () {
            $this->status = self::STATUS_CANCELLED;
            $this->save();
            $this->owner->notifyCoopCancellation;
            Mail::to($this->owner->email)->send(new CoopCancellation);

            $this->purchases()->chunk(100, function ($purchases) {
                foreach ($purchases as $purchase) {
                    $purchase->coop_cancelled = 1;
                    $purchase->save();
                    $transaction = $purchase->purchaseTransaction;

                    if ($transaction)
                        $transaction->refund();
                }
            });
        });
    }
}