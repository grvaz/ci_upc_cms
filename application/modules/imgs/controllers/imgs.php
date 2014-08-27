<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Imgs extends Front
{


    function __construct()
    {
        MX_Controller::__construct();
    }

	public function imgs_list($to_table, $element_id)
	{
      $this->load->model('imgs/imgs_model');
      return $this->imgs_model->get_imgs($to_table, $element_id);
	}


}

?>