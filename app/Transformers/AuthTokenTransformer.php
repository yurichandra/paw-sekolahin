<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Token;

class AuthTokenTransformer extends TransformerAbstract
{
    /**
     * Transform Token.
     *
     * @param Token $token
     */
    public function transform(Token $token)
    {
        return [
            'email' => $token->email,
            'password' => $token->password,
            'generated_at' => $token->generated_at,
            'last_used_at' => $token->last_used_at,
        ];
    }
}
