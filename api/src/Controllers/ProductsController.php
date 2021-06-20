<?php
namespace SmartMedia\Api\Controllers;

use SmartMedia\Api\Repositories\ProductsRepository;

class ProductsController
{
    /* @var $productsRepository ProductsRepository */
    protected $productsRepository = null;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function all()
    {
        return json_encode($this->productsRepository->fetchAll());
    }
}
