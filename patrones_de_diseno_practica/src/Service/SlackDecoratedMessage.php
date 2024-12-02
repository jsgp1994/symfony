<?php

namespace App\Service;

use App\Service\DecoratedMessageService;

class SlackDecoratedMessage extends DecoratedMessageService
{
    public function getMessage(string $name): string
    {
        return  "paso po Slack | " . parent::getMessage($name);
    }

}
