<?php

namespace AP\Modules\Console;

class MakeProvider extends Generator
{

    protected $signature = 'module:make:provider
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the provider. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new provider.';
    protected $type = 'Provider';

    protected function prepareVars()
    {
		$this->updateStubs('provider');
		return $this->initVars();
    }
}