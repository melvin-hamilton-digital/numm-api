<?php

namespace MHD\Numm\Api;

use GuzzleHttp\Psr7\Request;
use MHD\Numm\Data\Document;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var TokenProviderInterface
     */
    private $tokenProvider;

    public function __construct(
        ClientInterface        $httpClient,
        TokenProviderInterface $tokenProvider
    ) {
        $this->httpClient = $httpClient;
        $this->tokenProvider = $tokenProvider;
    }

    public function createDocument(Document $document): ResponseInterface
    {
        $request = new Request(
            'POST',
            '/services/apexrest/numm/HeaderVoucher__c/v1',
            $this->getRequestHeaders(),
            json_encode(['enteteList' => [$document]])
        );

        return $this->httpClient->sendRequest($request);
    }

    public function getRequestHeaders()
    {
        return [
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->tokenProvider->getToken()}",
        ];
    }
}
