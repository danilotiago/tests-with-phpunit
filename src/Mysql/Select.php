<?php

namespace App\Mysql;

class Select
{
    private $table;
    private $fields;

    /**
     * @param string $name
     */
    public function setTable(string $name): void
    {
        $this->table = $name;
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        $fields = $this->returnFieldsInString();
        $query = "SELECT {$fields} FROM {$this->table};";
        return $query;
    }

    /**
     * @return string
     */
    private function returnFieldsInString(): string
    {
        $fields = "*";
        if(!empty($this->fields)) {
            $fields = implode(", ", $this->fields);
        }
        return $fields;
    }
}