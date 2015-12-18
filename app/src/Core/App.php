<?php
namespace RenePenner\StateLessShop\Core;

class App extends \Slim\App
{
    private $config;

    public function __construct()
    {
        parent::__construct([]);
        $this->config = new Config();
        $this->registerModules();
    }

    private function registerModules()
    {
        $modules = $this->config->getModules();
        foreach ($modules as $module) {
            new $module($this);
        }
    }
}
