<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Front extends Base_Controller {


    function __construct()
    {
        MX_Controller::__construct();
        $this->load->model('front_model');
    }

	public function go_to_module($module, $method, $opts, $ajax=false)
	{
      if($ajax==true){
       if(substr($method,0,5)!='ajax_'){return false;}
      }
	  parse_str($opts, $opts_arr);  //exit($opts);
	  $this->load->module($module.'/'.$module)->$method($opts_arr);
      if($ajax==true){exit;}
	}

}

?>