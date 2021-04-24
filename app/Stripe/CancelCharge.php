<?php

namespace App\Actions\Stripe;

class CancelCharge
{
    /**
     * Mimis a Stripe cancellation.
     *
     * @param string $token string that identifies the target account.
     * @param int $amount in cents
     */
    public function refund(string $identifier)
    {
        sleep(10);

        return true;
    }
}
