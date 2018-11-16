<?php

namespace App\Unit\Mysql;

use PHPUnit\Framework\TestCase;
use App\Mysql\Filter;

class FiltersTest extends TestCase
{
    public function testWhere()
    {
        $expected = "WHERE id = 5";

        $filter = new Filter();
        $filter->where('id', 5);

        $this->assertEquals($expected, $filter->getSql());
    }

    public function testOrderBy()
    {
        $expected = 'ORDER BY created_at desc';

        $filter = new Filter();
        $filter->orderBy('created_at', 'desc');

        $this->assertEquals($expected, $filter->getSql());
    }

    public function testSelectAndOrderBy()
    {
        $expected = 'WHERE name = John John ORDER BY created_at desc';

        $filter = new Filter();
        $filter->where('name', 'John John');
        $filter->orderBy('created_at', 'desc');

        $this->assertEquals($expected, $filter->getSql());
    }
}