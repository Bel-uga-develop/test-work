<?php
declare(strict_types=1);

namespace Classes;

abstract class Controller
{
    protected Template $template;
    protected ?string $layouts = null;
    public array $vars = [];

    public function __construct()
    {
        $this->template = new Template($this->layouts, get_class($this));
    }

    abstract public function index(): void;
}
