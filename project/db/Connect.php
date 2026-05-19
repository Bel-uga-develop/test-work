<?php
declare(strict_types=1);

namespace DB;

use mysqli;

class Connect
{
    public ?mysqli $link = null;

    public function __construct()
    {
        $this->connect();
    }

    public function connect(): void
    {
        $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->link) {
            throw new \RuntimeException('Database connection failed: ' . mysqli_connect_error());
        }
        mysqli_query($this->link, 'SET NAMES utf8mb4');
        mysqli_query($this->link, 'SET CHARACTER SET utf8mb4');
        mysqli_query($this->link, 'SET COLLATION_CONNECTION="utf8mb4_unicode_ci"');
    }
}
