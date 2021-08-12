<?php

namespace MHD\Numm\Data;

class Credentials
{
    /**
     * @var string
     */
    public $clientId;
    /**
     * @var string
     */
    public $clientSecret;
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $token;

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $username,
        string $password,
        string $token
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->username = $username;
        $this->password = $password;
        $this->token = $token;
    }
}
