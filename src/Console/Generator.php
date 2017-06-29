<?php

namespace AP\Modules\Console;

use AP\Support\Generator as Base;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

abstract class Generator extends Base
{
	protected $stubsPath = 'stubs';
	protected $confFile = __DIR__.'/../../config/config.php';
	
	protected function initVars()
	{
		$module = $this->argument('module');
        $name = $this->argument('name');

        return [
            'name' => $name,
            'module' => $module
        ];
	}
	
	protected function prepareVars(){}
	
	protected function getInput()
    {
        return $this->argument('module');
    }

    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of the module to create. Eg: Blog'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Overwrite existing files with generated ones.'],
			['full', null, InputOption::VALUE_NONE, 'Generate complete structured module.'],
        ];
    }
}