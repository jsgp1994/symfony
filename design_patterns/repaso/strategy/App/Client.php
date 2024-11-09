<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Pse;
use App\Epayco;
use App\PaymenteInterface;
use App\DaviPlata;

class Client
{
    public function __construct(private PaymenteInterface $typeOfPayment) {

    }

    public function pay() {
        $this->typeOfPayment->pay();
    }

}


$juan = new Client(new DaviPlata());
$juan->pay();

