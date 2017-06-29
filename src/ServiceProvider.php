<?php

namespace AP\Modules;

use Illuminate\Foundation\AliasLoader;
use AP\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
	protected $namespace = 'AP\\Modules\\Console\\';
	protected $commands = [
		'Make' => 'command.module.make',
		'MakeFacade' => 'command.module.make.facade',
		'MakeProvider' => 'command.module.make.provider',
		'MakeController' => 'command.module.make.controller',
		'MakeRequest' => 'command.module.make.request',
		'MakeMiddleware' => 'command.module.make.middleware',
		'MakeModel' => 'command.module.make.model',
		'MakeContract' => 'command.module.make.contract',
		'MakeRepository' => 'command.module.make.repository',
		'MakeEvent' => 'command.module.make.event',
		'MakeListener' => 'command.module.make.listener',
		'MakeJob' => 'command.module.make.job',
		'MakePolicy' => 'command.module.make.policy',
		'Get' => 'command.module.get',
		'Enable' => 'command.module.enable',
		'Disable' => 'command.module.disable',
	];
	
	public function register()
	{
		$this->app->bind('AP\Modules\Contract', 'AP\Modules\Repository');
		$this->app->singleton('modules', function($app){
			return $app->make('AP\Modules\Contract');
		});
		
		foreach($this->commands as $class => $command){
			$this->app->singleton($command, function($app){
				return new $this->namespace.($class);
			});
			$this->commands($this->namespace.$class);
		}		
	}

	public function boot()
    {
        //$this->initModules();
    }
	
	public function provides()
	{
		$providers = ['modules'];
		
		if(!$this->app->environment('production')){
			$providers = array_merge($providers, $this->commands);
		}
		
		return $providers;
	}

	protected function initModules()
    {
        $modules = $this->app['modules']->all();

        $enabled = $modules->sortBy('enabled', true)->sortBy('order');

        if(count($enabled) > 0){
            foreach($enabled as $module){
                foreach($module['providers'] as $provider){
                    $this->app->register($provider);
                }

                if(!$this->app->environment("production")){
                    foreach($module['providers-dev'] as $providerDev){
                        $this->app->register($providerDev);
                    }
                }

                foreach($module['aliases'] as $alias => $class){
                    $class = $class.'::class';
                    AliasLoader::getInstance([$alias => $class])->register();
                }
            }
        }
    }
}