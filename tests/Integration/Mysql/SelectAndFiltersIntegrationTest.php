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

    public function testSelectWithFiltersWhereAndOrderWithMocks()
    {
        $expected = "SELECT * FROM users WHERE id = 5;";

        $select = new Select();
        $select->setTable('users');

        // mock de um objeto Filter
        $stub = $this->getMockBuilder(Filter::class)
            ->disableOriginalConstructor()
            ->getMock();
        $stub->method('getSql')
            ->willReturn('WHERE id = 5');

        $select->setFilter($stub);

        $this->assertEquals($expected, $select->getSql());
    }
}