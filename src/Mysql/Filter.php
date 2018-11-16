<?php

namespace App\Mysql;

class Filter
{
    private $sql = [];

    /**
     * @param string $row
     * @param $value
     */
    public function where(string $row, $value): void
    {
        $this->sql[] = "WHERE {$row} = {$value}";
    }

    public function orderBy(string $row, string $order): void
    {
        $this->sql[] = "ORDER BY {$row} {$order}";
    }

    /**
     * @return string
     */
    public function getSql()
    {
        return implode(" ", $this->sql);
    }
}