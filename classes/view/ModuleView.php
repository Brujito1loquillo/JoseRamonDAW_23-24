<?php

class ModuleView extends View {
    private $moduleName;

    public function __construct (String $module) {
        parent::__construct();

        $this->templates["resource"] = $module;
        $this->moduleName = strtoupper($module);
    }

    public function getName (): String {
        return $this->moduleName;
    }
}