<?php

namespace AP\Modules\Console;

class MakeFacade extends Generator
{

    protected $signature = 'module:make:facade
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the facade. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new facade.';
    protected $type = 'Facade';

    protected function prepareVars()
    {
		$this->updateStubs('facade');
		return $this->initVars();
    }
}