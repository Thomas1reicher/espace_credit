<?php
namespace App\Component;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Request
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function Request(string $met , string $url , string $data): array
    {
        $response = $this->client->request(
            $met,
            $url,[
                'body' => data
            ]
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }

}