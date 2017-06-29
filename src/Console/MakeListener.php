<?php

namespace AP\Modules\Console;

class MakeListener extends Generator
{

    protected $signature = 'module:make:listener
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the listener. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}
						{--e|event : Also create event for listener.}';
    protected $description = 'Creates a new listener.';
    protected $type = 'Listener';

    protected function prepareVars()
    {
		if($this->option('event')){
			$this->updateStubs(['listener', 'event']);
		}else{
			$this->updateStubs('listener');
		}
		
		return $this->initVars();
    }

}