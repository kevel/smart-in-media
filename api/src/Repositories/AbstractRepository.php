<?php
namespace SmartMedia\Api\Repositories;

use SmartMedia\Api\Db\Dbh;

abstract class AbstractRepository
{
    /* @var $dbh Dbh */
    protected $dbh = null;

    public function __construct(Dbh $dbh)
    {
        $this->dbh = $dbh;
    }

    abstract public function fetchAll();
}
