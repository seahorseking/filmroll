<?php
class Database extends Part{
	
	protected $done;
	
	public function __construct($module){
		parent::__construct($module);
		
		$this->done = array();
	}
	
	public function index(){
		//include all modules
		if (file_exists(APPPATH."/config/module.php")){
			include(APPPATH."/config/module.php");
			if (isset($config['module']) && sizeof($config['module'])){
				foreach($config['module'] as $module){
					$this->_create_table($module);
				}
			}
			else{
				die("no modules in config module.php file");
			}
		}
		else{
			die("file missing: application/config/module.php");
		}
		echo "All tables have been created successfuly";
	}
	
	public function _create_table($module){
		if (!in_array($module, $this->done)){
			$this->done[] = $module;
			//if module has a autoload file
			if (file_exists(MODPATH.$module."/config/autoload.php")){
				include(MODPATH.$module."/config/autoload.php");
				if (isset($autoload)){
					//ak mam loadnut iny modul pred tymto
					if (isset($autoload['module']) && sizeof($autoload['module']) > 0){
						foreach($autoload['module'] as $m){
							if (!in_array($m, $this->done)){
								$this->_create_table($m);
							}
						}
					}
					//ak mam nejake modely na loadovanie
					if (isset($autoload['model']) && sizeof($autoload['model']) > 0){
						foreach($autoload['model'] as $m){
							include(MODPATH.$module."/models/".$m.".php");
							$class = ucfirst($m);
							$obj = new $class();
							$obj->_create_table();
						}
					}
					unset($autoload);
				}
			}
		}
	}
}