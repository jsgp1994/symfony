<?php

namespace App\Service;

use Psr\Cache\CacheItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MixRepository
{

    private $urlDatabase = 'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json';

    public function __construct(
        private HttpClientInterface $client,
        private CacheInterface $cache,
        private bool $isDebug
    )
    {
    }

    public function findAll(): array
    {

        return $this->cache->get('mixes_data', function(CacheItemInterface $item)  {
            $item->expiresAfter($this->isDebug ? 5 : 60);
            $response = $this->client->request('GET', $this->urlDatabase);
            return $response->toArray();
        });
    }

}
