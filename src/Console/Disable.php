<?php

namespace AP\Modules\Console;

use Modules;
use Illuminate\Console\Command;

class Disable extends Command
{
    protected $signature = 'module:disable
							{module : The name of the module to disable. Eg: Blog}';
    protected $description = 'Disable module.';
    protected $type = 'Modules';

    public function fire()
	{
		$module = $this->argument('module');
		
		$this->info(Modules::disable($module));
	}
}