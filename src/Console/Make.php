<?php

namespace AP\Modules\Console;

use Modules;

class Make extends Generator
{
	protected $signature = 'module:make
							{module : The name of the module to create. Eg: Blog}
							{--author= : Author of the module, without space.}
							{--enabled= : Enable the module [default - false].}
							{--order= : Order when module should initilized.}
							{--homepage= : Homepage address including [https/http://].}
							{--f|force : Overwrite existing files with generated ones.}
							{--a|full : Generate complete structured module.}';
	protected $description = 'Make Modules';
	protected $type = 'Module';
	protected $stubs = [
		'config' => 'resources/config/config.php',
		'module' => 'module.json',
		'dev.provider' => '{{studly_name}}ServiceProvider.php',
		'dev.facade' => '{{studly_name}}Facade.php',
		'controller' => 'Http/Controllers/{{studly_name}}Controller.php',
		'routes' => 'Http/routes.php',
	];
	
	protected function prepareVars()
    {
		$module = $this->argument('module');

        $homepage = $this->option('homepage') ?: 'https://anandpilania.github.io';
        $site = str_contains($homepage, 'https://') ? str_replace('https://', '', $homepage) : $homepage;
        $site = str_contains($site, 'http://') ? str_replace('http://', '', $site) : $site;

        return [
			'name' => $module,
            'author' => $this->option('author') ?: 'anutiger',
            'module'   => $module,
            'enabled' => $this->option('enabled') ?: 0,
            'order' => $this->option('order') ?: 1,
            'homepage' => $homepage,
            'site' => $site,
        ];
    }
}