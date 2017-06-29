<?php

namespace AP\Modules\Console;

class MakeRepository extends Generator
{

    protected $signature = 'module:make:repository
						{module : The name of the module to create. Eg: Blog}
						{name : The name of the repository. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}
						{--a|full : Also create model and contract for model.}
						{--m|model : Also create model for model.}
						{--c|contract : Also create contract for model.}';
    protected $description = 'Creates a new repository.';
    protected $type = 'Repository';

    protected function prepareVars()
    {
		if($this->option('full')){
			$this->updateStubs(['repository', 'model', 'contract']);
		}elseif($this->option('model')){
			$this->updateStubs(['model', 'repository']);
		}elseif($this->option('contract')){
			$this->updateStubs(['repository', 'contract']);
		}else{
			$this->updateStubs('repository');
		}
		
		return $this->initVars();
    }
}