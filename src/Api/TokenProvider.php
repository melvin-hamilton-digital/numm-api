<?php

namespace MHD\Numm\Api;

use Exception;
use GuzzleHttp\Psr7\Request;
use MHD\Numm\Data\Credentials;
use Psr\Http\Client\ClientInterface;

class TokenProvider implements TokenProviderInterface
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Credentials
     */
    private $credentials;
    /**
     * @var string
     */
    private $token;

    public function __construct(
        ClientInterface $httpClient,
        Credentials     $credentials
    ) {
        $this->httpClient = $httpClient;
        $this->credentials = $credentials;
    }

    public function getToken(): string
    {
        if ($this->token === null) {
            $this->token = $this->requestToken();
        }

        return $this->token;
    }

    protected function requestToken(): string
    {
        $payload = [
            'client_id' => $this->credentials->clientId,
            'client_secret' => $this->credentials->clientSecret,
            'grant_type' => 'password',
            'username' => $this->credentials->username,
            'password' => $this->credentials->password . $this->credentials->token,
        ];

        $request = new Request(
            'POST',
            '/services/oauth2/token',
            ['content-type' => 'application/x-www-form-urlencoded'],
            http_build_query($payload)
        );

        $response = $this->httpClient->sendRequest($request);
        $data = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() >= 400) {
            throw new Exception("{$data->error}: {$data->error_description}");
        }

        return $data->access_token;
    }
}
