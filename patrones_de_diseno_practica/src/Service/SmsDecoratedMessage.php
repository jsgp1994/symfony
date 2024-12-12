<?php

namespace App\Service;

use App\Service\DecoratedMessageService;

class SmsDecoratedMessage extends DecoratedMessageService
{
    public function getMessage(string $message): string
    {
        return 'Paso por SMS | '.parent::getMessage($message);
    }
}

