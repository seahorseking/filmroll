<?php
class MY_Controller extends CI_Controller{
	
	//module name
	public $module_name;
	
	//module part
	protected $part;
	
	//module models
	protected $module_model = array();
	
	//values of module class method a =nd parmas to be called
	protected $override_class;
	protected $override_method;
	protected $override_params;
	
	public function __construct($module_name){
		parent::__construct();
		
		//set module name
		$this->module_name = $module_name;
		
		//initialize loader with module
		//$this->load->initialize();
		
		
		/*
		 * ------------------------------------------------------
		*  Instantiate the routing class and set the routing
		* ------------------------------------------------------
		*/
		$RTR =& load_class('ModuleRouter', 'core');
		$RTR->initialize($this->module_name);
		$RTR->parse_route();

		$this->override_class  = $RTR->fetch_class();
		$this->override_method = $RTR->fetch_method();
		$this->override_params = $RTR->fetch_params();
		
		//echo $this->override_class."->".$this->override_method."->";
		
		//include wanted clas
		if (!file_exists(MODPATH.$this->module_name.'/parts/'.$this->override_method.'.php')){
			show_404("{$this->override_class}/{$this->override_method}");
		}
		include(MODPATH.$this->module_name.'/parts/'.$this->override_method.'.php');
		
		/*
		 * ------------------------------------------------------
		*  Security check
		* ------------------------------------------------------
		*
		*  None of the functions in the app controller or the
		*  loader class can be called via the URI, nor can
		*  controller functions that begin with an underscore
		*/
		
		if ( ! class_exists($this->override_method)
		OR strncmp($this->override_params[0], '_', 1) == 0
		OR in_array(strtolower($this->override_params[0]), array_map('strtolower', get_class_methods('Part')))
		)
		{
			if ( ! empty($RTR->routes['404_override']))
			{
				$x = explode('/', $RTR->routes['404_override']);
				$this->override_class = $x[0];
				$method = (isset($x[1]) ? $x[1] : 'index');
				if ( ! class_exists($this->override_class))
				{
					if ( ! file_exists(MODPATH.$this->module_name.'/parts/'.$this->override_method.'.php'))
					{
						show_404("{$this->override_method}/{$this->override_params[0]}");
					}
		
					include_once(MODPATH.$this->module_name.'/psrts/'.$this->override_method.'.php');
				}
			}
			else
			{
				show_404("{$this->override_method}/{$this->override_params[0]}");
			}
		}
	}
	
	public function _remap($method, $params = array()){
		$this->part = new $this->override_method($this);
		// Call the requested method.
		// Any URI segments present (besides the class/function) will be passed to the method for convenience
		call_user_func_array(array(&$this->part, $this->override_params[0]), array_slice($this->override_params, 1));
	}
	
}