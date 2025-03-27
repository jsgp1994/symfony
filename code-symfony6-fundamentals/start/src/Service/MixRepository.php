<?php

namespace App\Service;

use Psr\Cache\CacheItemInterface;
use Symfony\Bridge\Twig\Command\DebugCommand;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class MixRepository
{

    private $urlDatabase = 'SymfonyCasts/vinyl-mixes/main/mixes.json';

    public function __construct(
        private HttpClientInterface $githubContentClient,
        private CacheInterface $cache,
        #[Autowire('kernel.debug')]
        private bool $isDebug,
        #[Autowire(service: 'twig.command.debug')]
        private DebugCommand $twigDebugCommand
    )
    {
    }

    public function findAll(): array
    {

        return $this->cache->get('mixes_data', function(CacheItemInterface $item)  {
            $item->expiresAfter($this->isDebug ? 5 : 60);
            $response = $this->githubContentClient->request('GET', $this->urlDatabase);
            return $response->toArray();
        });
    }

}
