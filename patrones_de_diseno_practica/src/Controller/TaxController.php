<?php

namespace App\Controller;

use App\Service\Tax\DefaultTaxService;
use App\Service\Tax\TaxColombiaService;
use App\Service\Tax\TaxContextService;
use App\Service\Tax\TaxSpainService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaxController extends AbstractController
{

    public function __construct(
        private TaxContextService $tax,
        private TaxColombiaService $taxColombia,
        private TaxSpainService $taxSpain,
        private DefaultTaxService $defaultTaxService
    ) {

    }

    #[Route('/tax/{pais}', name: 'app_tax')]
    public function index(string $pais): Response
    {
        $amount = random_int(100, 1000);

        match ($pais) {
            'col' => $this->tax->setTax($this->taxColombia),
            'esp' => $this->tax->setTax($this->taxSpain),
            default => $this->tax->setTax($this->defaultTaxService)
        };

        $tax = $this->tax->getTax($amount);

        return $this->render('tax/index.html.twig', [
            'amount' => $amount,
            'tax' => $tax
        ]);
    }
}
