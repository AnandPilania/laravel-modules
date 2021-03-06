<?php

namespace AP\Modules\Console;

class MakeModel extends Generator
{

    protected $signature = 'module:make:model
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the model. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}
						{--a|full : Also create repository and contract for model.}
						{--r|repo : Also create repository for model.}
						{--c|contract : Also create contract for model.}';
    protected $description = 'Creates a new model.';
    protected $type = 'Model';

    protected function prepareVars()
    {
		if($this->option('full')){
			$this->updateStubs(['model', 'repository', 'contract']);
		}elseif($this->option('repo')){
			$this->updateStubs(['model', 'repository']);
		}elseif($this->option('contract')){
			$this->updateStubs(['model', 'contract']);
		}else{
			$this->updateStubs('model');
		}
		
		return $this->initVars();
    }

}