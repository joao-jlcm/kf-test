<?php

namespace App\Models;

use App\Actions\Stripe\RefundCharge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'buyer_id', 'coop_id', 'purchase_id', 'source'];

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

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    protected function processRefund(array $data)
    {
        $refund = Transaction::where('purchase_id', $this->purchase_id)->where('type', 'refund')->first();

        if ($refund)
            return;

        return Transaction::create([
            'amount' => $this->amount,
            'buyer_id' => $this->buyer_id,
            'coop_id' => $this->coop_id,
            'purchase_id' => $this->purchase_id,
            'type' => 'refund',
        ]);
    }

    public function refund()
    {
        switch ($this->source) {
            case 'KickfurtherCredits':
            case 'KickfurtherFunds':
                // refund with the same source
                $this->processRefund(['source' => $this->source]);
                break;
            case 'CreditCard':
                if ($this->is_pending) {
                    $this->is_canceled = 1;
                    $this->save();
                } else {
                    // refund using buyer's preference
                    $this->processRefund(['source' => $this->purchase->buyer->refund_pref]);

                    // call stripe's api
                    RefundCharge::refund($this->purchase->banking_customer_token, $this->amount);
                }

                break;
        }
    }
}
