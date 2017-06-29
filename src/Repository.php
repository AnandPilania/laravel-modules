<?php

namespace AP\Modules\Repository;

use AP\Support\Json;
use AP\Modules\Contracts\Modules as Contract;

class Repository implements Contract
{
    protected $json;
    protected $modules;
	
	public function __construct($update = null)
	{
	    if($update || !file_exists(base_path('modules.json'))){
	        $this->update();
        }

	    if(!$this->modules){
			$this->all();
		}
	}

	public function update($file = null)
    {
		$this->modules = null;
		
        foreach(glob(base_path('modules/*/module.json')) as $module){
            $json = new Json($module);
            $this->modules[] = $json->get();
        }
        $content = str_replace('\/', '/', json_encode($this->modules, JSON_PRETTY_PRINT));

        $file = $file ?: base_path('modules.json');

        if(file_exists($file)){
            @unlink($file) ?: @rmdir($file);
        }

        file_put_contents($file, $content);

        return $this->all();
    }

	public function all()
	{
		$this->json = new Json(base_path('modules.json'));
        return $this->modules = $this->json->get();
	}
	
	public function enabled()
	{
		return $this->modules->where('enabled', 1);
	}
	
	public function enable($module)
	{
		$file = base_path("modules/{$module}/module.json");
		
		if($get = $this->get($module))
		{
			if($get['enabled'] == 1){
				return "[{$module}] is already enabled!";
			}else{
				$this->json = new Json($file);
				return $this->json->set('enabled', 1) ? $this->update() : null;
			}
		}
		
		return "[{$module}] not exists!";
	}
	
	public function disabled()
	{
		return $this->modules->where('enabled', 0);
	}
	
	public function disable($module)
	{
		$file = base_path("modules/{$module}/module.json");
		
		if($get = $this->get($module))
		{
			if($get['enabled'] == 0){
				return "[{$module}] is already disabled!";
			}else{
				$this->json = new Json($file);
				return $this->json->set('enabled', 0) ? $this->update() : null;
			}
		}
		
		return "[{$module}] not exists!";
	}
	
	public function get($name)
	{
		if($module = $this->modules->where('name', $name)){
			foreach($module as $m){
				return $m;
				break;
			}
		}
		return null;
	}

	public function sort($sort)
    {
        if($sort == 'desc'){
            $sort = 'sortBy'.ucfirst($sort);
            return $this->modules->$sort($sort);
        }
        return $this->modules->sortBy($sort);
    }

    public function add($module)
    {
        $this->modules = array_prepend($this->modules, $module);
        return $this->json->save($this->modules);
    }

    public function remove($module)
    {}
}