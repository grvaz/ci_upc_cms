<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{     print_r( modules::run('test/test/index', 115));
		//$this->load->view('welcome_message', array('data'=>array('vzl1','vzl2','vzl3')));


	}

    public function test()
	{


	   $this->load->model('Main_model');

		$this->load->view('welcome_message', $this->Main_model->test());
	}
    /*function _remap($method)
{
    //echo '<div style="position: absolute; z-index: 9999; background-color: #FFFFFF; color: #000000; font-weight: bold; font-size: 12px; padding: 5px; text-align: left"><pre><span style="background-color: #FFFFFF;">'; print_r($GLOBALS); echo '</span></pre></div>';
}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */