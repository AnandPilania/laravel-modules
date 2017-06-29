<?php

namespace AP\Modules;

use AP\Support\Facade;

class ModulesFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'modules';
	}
}