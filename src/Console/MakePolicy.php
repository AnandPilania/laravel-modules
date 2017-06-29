<?php

namespace AP\Modules\Console;

class MakePolicy extends Generator
{

    protected $signature = 'module:make:policy
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the policy. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new policy.';
    protected $type = 'Policy';

    protected function prepareVars()
    {
		$this->updateStubs('policy');
		return $this->initVars();
    }
}