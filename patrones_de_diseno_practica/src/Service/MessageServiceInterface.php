<?php

namespace App\Service;

interface MessageServiceInterface
{
    public function getMessage(string $name): string;
}
