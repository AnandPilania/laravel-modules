<?php

namespace AP\Modules\Console;

use Modules;
use Illuminate\Console\Command;

class Get extends Command
{
    protected $signature = 'module:get
							{--e|enabled : Get only enabled modules.}
							{--d|disabled : Get only disabled modules.}
							{--module= : Get specific module.}
							{--sort= : Get modules by order or desc.}
							{--f|force : Reload all modules.}';
    protected $description = 'Get list of modules.';
    protected $type = 'Modules';

    public function fire()
	{
		$modules = null;
		
		if($this->option('force')){
			Modules::update();
		}
		
		if($enabled = $this->option('enabled')){
			$modules = Modules::enabled();
		}

		if($disabled = $this->option('disabled')){
			$modules = Modules::disabled();
		}

		if($module = $this->option('module')) {
            $modules = Modules::get($module);
        }

        if($sort = $this->option('sort')) {
            $modules = Modules::sort($sort);
        }

        if(!$enabled && !$disabled && !$module && !$sort){
			$modules = Modules::all();
		}
		
		if($modules){
			$this->info(count($modules) > 0 ? $modules : 'No modules found for specific criteria!');
		}else{
			$this->error('Something went wrong!! Please try again later!');
		}
	}
}