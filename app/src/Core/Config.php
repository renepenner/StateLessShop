<?php
namespace RenePenner\StateLessShop\Core;

class Config
{
    private $modules;

    public function __construct()
    {
        $this->loadModules();
    }

    public function getModules()
    {
        return $this->modules;
    }

    private function loadModules()
    {
        $modules_file = file_get_contents("../app/etc/modules.json");
        $modules_json = json_decode($modules_file);

        foreach ($modules_json as $module => $namespace) {
            $class_name = $namespace . '\\' . $module;
            $this->modules[] = $class_name;
        }
    }
}
