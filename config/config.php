<?php

return [

	'path' => base_path('modules/'),
	'generate' => [
		'default' => [
			'module' => 'module.json',
			'config' => 'resources/config/config.php',
			'provider' => 'Providers/{{studly_name}}ServiceProvider.php',
			'facade' => 'Facades/{{studly_name}}Facade.php',
			'routes' => 'Http/routes.php',
			'controller' => 'Http/Controllers/{{studly_name}}Controller.php'
		],
		'full' => [
			'contract' => 'Contracts/{{studly_name}}Interface.php',
			'repository' => 'Repository/{{studly_name}}Repository.php',
			'model' => 'Models/{{studly_name}}Model.php',
			'request' => 'Http/Requests/{{studly_name}}Request.php',
			'event' => 'Events/{{studly_name}}Event.php',
			'listener' => 'Listeners/{{studly_name}}Listener.php',
			'job' => 'Jobs/{{studly_name}}Job.php',
			'policy' => 'Policies/{{studly_name}}Policy.php',
		],
	]
];