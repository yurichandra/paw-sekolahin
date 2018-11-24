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
            'campaign' => $donation->campaign->title,
            'donors' => $donation->user->name,
            'proof' => $this->getProof($donation),
        ];
    }

    protected function getProof(Donation $donation)
    {
        return $donation->proof !== null ? $donation->proof->path : null;
    }
}
