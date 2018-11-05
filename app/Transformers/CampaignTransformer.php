<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Campaign;

class CampaignTransformer extends TransformerAbstract
{
    /**
     * Transform Campaign.
     *
     * @param Campaign $campaign
     */
    public function transform(Campaign $campaign)
    {
        return [
            'id' => $campaign->id,
            'title' => $campaign->title,
            'body' => $campaign->body,
            'target' => $campaign->target,
            'raised' => $campaign->raised,
            'date' => $campaign->date,
            'photo' => $campaign->photo->path,
            'school' => $this->schoolDetails($campaign),
        ];
    }

    /**
     * Get school details.
     *
     * @param Campaign $campaign
     */
    public function schoolDetails(Campaign $campaign)
    {
        return [
            'id' => $campaign->school->id,
            'name' => $campaign->school->name,
        ];
    }
}
