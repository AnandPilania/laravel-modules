<?php

namespace AP\Modules\Console;

class MakeMiddleware extends Generator
{

    protected $signature = 'module:make:middleware
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the middleware. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new middleware.';
    protected $type = 'Middleware';

    protected function prepareVars()
    {
		$this->updateStubs('middleware');
		return $this->initVars();
    }
}