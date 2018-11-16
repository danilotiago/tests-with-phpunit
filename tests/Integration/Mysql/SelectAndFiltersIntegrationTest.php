<?php

namespace App\Integration\Mysql;

use App\Mysql\Filter;
use App\Mysql\Select;
use PHPUnit\Framework\TestCase;

class SelectAndFiltersIntegrationTest extends TestCase
{
    public function testSelectWithFiltersWhereAndOrder()
    {
        $expected = "SELECT * FROM users WHERE id = 5;";

        $select = new Select();
        $select->setTable('users');

        $filter = new Filter();
        $filter->where('id', 5);

        $select->setFilter($filter);

        $this->assertEquals($expected, $select->getSql());
    }
}