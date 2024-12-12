<?php

namespace App\Service;

use App\Service\MessageServiceInterface;

class DecoratedMessageService implements MessageServiceInterface
{

    private MessageServiceInterface $decoratedService;
    public function __construct(MessageServiceInterface $decoratedService) {
        $this->decoratedService = $decoratedService;
    }

    public function getMessage(string $name): string
    {
        return  $this->decoratedService->getMessage($name);
    }

}

