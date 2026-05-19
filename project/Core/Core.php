<?php

declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    $file = SITE_PATH . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
