<?php

namespace App;

class Pse implements PaymenteInterface
{
    public function pay(): void
    {
        echo "Paying with Pse";
    }
}
