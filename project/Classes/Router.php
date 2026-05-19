<?php

declare(strict_types=1);

namespace Classes;

use Exception;

class Router
{
    private ?string $path = null;
    private array $args = [];

    public function setPath(string $path): void
    {
        $path = rtrim($path, '/\\') . DS;
        if (!is_dir($path)) {
            throw new Exception('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }

    private function getController(?string &$file, ?string &$controller, ?string &$action, array &$args): void
    {
        $route = $_GET['route'] ?? '';
        unset($_GET['route']);
        if (empty($route)) {
            $requestUri = $_SERVER['REQUEST_URI'] ?? '';
            $path = parse_url($requestUri, PHP_URL_PATH) ?? '';
            $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
            if (strpos($path, $scriptName) === 0) {
                $path = substr($path, strlen($scriptName));
            } else {
                $scriptDir = dirname($scriptName);
                if ($scriptDir !== '/' && strpos($path, $scriptDir) === 0) {
                    $path = substr($path, strlen($scriptDir));
                }
            }
            $route = $path;
        }
        if (empty($route)) {
            $route = 'index';
        }
        $route = trim($route, '/\\');
        $parts = explode('/', $route);

        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $fullpath = $cmd_path . $part;

            if (is_dir($fullpath)) {
                $cmd_path .= $part . DS;
                array_shift($parts);
                continue;
            }

            if (is_file($fullpath . 'Controller.php')) {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }

        if (empty($controller)) {
            $controller = 'index';
        }

        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'index';
        }

        $file = $cmd_path . $controller . 'Controller.php';
        $args = $parts;
    }

    public function start(): void
    {
        $file = null;
        $controller = null;
        $action = null;
        $args = [];
        $this->getController($file, $controller, $action, $args);

        if ($file === null || !file_exists($file)) {
            http_response_code(404);
            die('404 Not Found');
        }

        include($file);

        $class = 'Controllers\\' . ucfirst($controller) . 'Controller';
        if (!class_exists($class)) {
            http_response_code(404);
            die('404 Not Found');
        }

        $controllerInstance = new $class();

        if (!is_callable([$controllerInstance, $action])) {
            http_response_code(404);
            die('404 Not Found');
        }

        $controllerInstance->$action();
    }
}
