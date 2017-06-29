<?php

namespace AP\Modules\Console;

class MakeController extends Generator
{

    protected $signature = 'module:make:controller
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the controller. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new controller.';
    protected $type = 'Controller';

    protected function prepareVars()
    {
		$this->updateStubs('controller');
		return $this->initVars();
    }
}