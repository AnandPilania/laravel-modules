<?php

namespace AP\Modules\Console;

class MakeContract extends Generator
{

    protected $signature = 'module:make:contract
						{module : The name of the module. Eg: Blog}
						{name : The name of the contract. Eg: Posts}
						{--f|force : Overwrite existing files with generated ones.}
						{--a|full : Also create repository and model for contract.}
						{--r|repo : Also create repository for contract.}
						{--m|model : Also create model for contract.}';
    protected $description = 'Creates a new contract.';
    protected $type = 'Contract';

    protected function prepareVars()
    {
		if($this->option('full')){
			$this->updateStubs(['contract', 'repository', 'model']);
		}elseif($this->option('repo')){
			$this->updateStubs(['contract', 'repository']);
		}elseif($this->option('contract')){
			$this->updateStubs(['contract', 'model']);
		}else{
			$this->updateStubs('contract');
		}
		
		return $this->initVars();
    }

}