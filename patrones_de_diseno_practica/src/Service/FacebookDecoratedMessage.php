<?php

namespace App\Service;

class FacebookDecoratedMessage extends DecoratedMessageService
{

    public function getMessage(string $message): string
    {
        return 'Paso por Facebook | '.parent::getMessage($message);
    }

}
