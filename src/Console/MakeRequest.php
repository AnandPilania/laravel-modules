<?php

namespace AP\Modules\Console;

class MakeRequest extends Generator
{

    protected $signature = 'module:make:request
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the request. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new request.';
    protected $type = 'Request';

    protected function prepareVars()
    {
		$this->updateStubs('request');
		return $this->initVars();
    }
}