<?php
namespace App\Service;

use App\Entity\Brand;
use App\Repository\BrandRepository;

class BrandService
{
    private $brandRepository;

    public function __construct(BrandRepository $brandRepository) {
        $this->brandRepository = $brandRepository;
    }

    public function searchBrand($brand_id): Brand
    {
        return $this->brandRepository->find($brand_id);
    }


}