<?php

namespace App\Service;

use App\Service\MessageServiceInterface;

class BasicMessageService implements MessageServiceInterface
{

    public function getMessage(string $name): string
    {
        return "Hola, $name";
    }

}
