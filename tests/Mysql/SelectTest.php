<?php

namespace App\Mysql;

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    public function testSelectSemFiltro()
    {
        $expected = 'SELECT * FROM pages;';
        $select = new Select();

        $select->setTable('pages');

        $this->assertEquals($expected, $select->getSql());
    }

    public function testSelectComCampos()
    {
        $campos = [
            'name',
            'email'
        ];
        $expected = "SELECT name, email FROM users;";

        $select = new Select();
        $select->setTable('users');
        $select->setFields($campos);

        $this->assertEquals($expected, $select->getSql());
    }
}