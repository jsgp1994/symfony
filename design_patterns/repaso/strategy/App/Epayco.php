<?php

namespace App;

class Epayco implements PaymenteInterface
{
    public function pay(): void
    {
        echo "Paying with Epayco";
    }
}
