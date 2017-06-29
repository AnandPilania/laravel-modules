<?php

namespace AP\Modules\Console;

use Modules;
use Illuminate\Console\Command;

class Enable extends Command
{
    protected $signature = 'module:enable
							{module : The name of the module to enable. Eg: Blog}';
    protected $description = 'Enable module.';
    protected $type = 'Modules';

    public function fire()
	{
		$module = $this->argument('module');
		
		$this->info(Modules::enable($module));
	}
}