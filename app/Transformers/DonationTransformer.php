<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Donation;

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
