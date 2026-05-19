<?php
declare(strict_types=1);

namespace Classes;

abstract class Model
{
    protected \DB\Connect $db;
    public string $query = '';
    public ?string $err = null;
    public mixed $result = null;

    public function __construct()
    {
        global $dbObject;
        $this->db = $dbObject;
    }

    public function run(string $query): void
    {
        $this->query = $query;
        $this->result = mysqli_query($this->db->link, $this->query);
        $this->err = mysqli_error($this->db->link) ?: null;
    }
}
