<?php

namespace AP\Modules\Console;

class MakeJob extends Generator
{

    protected $signature = 'module:make:job
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the job. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}';
    protected $description = 'Creates a new job.';
    protected $type = 'Job';

    protected function prepareVars()
    {
		$this->updateStubs('job');
		return $this->initVars();
    }
}