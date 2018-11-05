<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class DonationTransformer extends TransformerAbstract
{
    public function transform(Donation $donation)
    {
        return [
            'id' => $donation->id,
            'amount' => $donation->amount,
            'status' => $donation->status,
            'message' => $donation->message,
            'donors' => $donation->user->name,
        ];
    }
}
