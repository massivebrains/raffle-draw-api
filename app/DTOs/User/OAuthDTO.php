<?php

namespace App\DTOs;


class OAuthDTO extends BaseDTO
{
    public string $id;

    public string $user_id;

    public string $name;

    public string $secret;

    public string $password_client;

    public string $personal_access_client;

    public string $redirect;

    public string $revoked;


    public static function fromRequest(array $params)
    {
        return new self([
            'id' => $params['user_id'],
            'user_id' => $params['user_id'],
            'name' => $params['username'],
            'secret' => base64_encode(hash_hmac('sha256', $params['plain_password'], 'secret', true)),
            'password_client' => 1,
            'personal_access_client' => 0,
            'redirect' => '',
            'revoked' => 0,
        ]);
    }
}
