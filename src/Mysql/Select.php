<?php

namespace App\Mysql;

class Select
{
    private $table;

    /**
     * @param string $name
     */
    public function setTable(string $name): void
    {
        $this->table = $name;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return "SELECT * FROM {$this->table};";
    }
}