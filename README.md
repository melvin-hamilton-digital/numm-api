# Numm API

## Example usage

```php
use GuzzleHttp\Client as HttpClient;
use MHD\Numm\Api\Client as NummClient;
use MHD\Numm\Api\TokenProvider;
use MHD\Numm\Data\Credentials;
use MHD\Numm\Data\Document;

$credentials = new Credentials(
    'clientId',
    'clientSecret',
    'username',
    'password',
    'token'
);
$httpClient = new HttpClient(['base_uri' => 'example.org']);
$tokenProvider = new TokenProvider($credentials, $httpClient);
$nummClient = new NummClient($httpClient, $tokenProvider);

$invoice = new Document();
# set invoice parameters
# ...

$response = $nummClient->createDocument($invoice);
if ($response->getStatusCode() >= 400) {
    throw new Exception($response->getBody()->getContents());
}

# process API response
# ...
```
 
