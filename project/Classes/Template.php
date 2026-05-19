<?php
declare(strict_types=1);

namespace Classes;

use Smarty\Smarty;

class Template
{
    private string $controller;
    private ?string $layouts;
    private array $vars = [];
    private Smarty $smarty;

    public function __construct(?string $layouts, string $controllerName)
    {
        $this->layouts = $layouts;
        $controllerName = str_replace("Controllers\\", "", $controllerName);
        $controllerName = str_replace("Controller", "", $controllerName);
        $this->controller = strtolower($controllerName);

        // Initialize Smarty
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(SITE_PATH . 'Views');
        
        $compileDir = SITE_PATH . 'tmp/templates_c';
        if (!is_dir($compileDir)) {
            mkdir($compileDir, 0777, true);
        }
        $this->smarty->setCompileDir($compileDir);

        $cacheDir = SITE_PATH . 'tmp/cache';
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }
        $this->smarty->setCacheDir($cacheDir);
    }

    public function vars(string $varname, mixed $value): bool
    {
        if (isset($this->vars[$varname])) {
            trigger_error('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
            return false;
        }
        $this->vars[$varname] = $value;
        return true;
    }

    public function view(string $name): bool
    {
        $pathLayout = 'layouts/' . $this->layouts . '.tpl';
        $contentPage = $this->controller . '/' . $name . '.tpl';

        // Check if layout and template exist relative to TemplateDir
        $templateDir = $this->smarty->getTemplateDir(0);
        if (!file_exists($templateDir . DS . $pathLayout)) {
            trigger_error('Layout `' . $this->layouts . '` does not exist.', E_USER_NOTICE);
            return false;
        }
        if (!file_exists($templateDir . DS . $contentPage)) {
            trigger_error('Template `' . $name . '` does not exist.', E_USER_NOTICE);
            return false;
        }

        // Assign variables to Smarty
        foreach ($this->vars as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        $this->smarty->assign('contentPage', $contentPage);

        // Render the layout
        $this->smarty->display($pathLayout);
        return true;
    }
}
