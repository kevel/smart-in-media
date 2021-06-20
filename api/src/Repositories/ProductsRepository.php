<?php
namespace SmartMedia\Api\Repositories;

class ProductsRepository extends AbstractRepository
{
    public function fetchAll()
    {
        return $this->dbh
            ->query('SELECT * FROM products')
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
}
