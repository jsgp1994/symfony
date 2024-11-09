<?php

namespace App;

class Daviplata implements PaymenteInterface
{
    public function pay(): void
    {
        echo "Paying with Daviplata";
    }
}
