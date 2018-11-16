<?php

namespace App\Mysql;

class Select
{
    private $table;
    private $fields;
    private $filters;

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
     * @param Filter $filter
     */
    public function setFilter(Filter $filter): void
    {
        $this->filters = $filter->getSql();
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        $fields = $this->returnFieldsInString();
        $query = "SELECT {$fields} FROM {$this->table}";

        if(!empty($this->filters)) {
            $query .= " $this->filters";
        }
        return $query . ";";
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