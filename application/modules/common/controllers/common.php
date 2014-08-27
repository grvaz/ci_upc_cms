<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Common extends Base_controller {



    function __construct()
    {
        parent::__construct();

    }

	public function ajax_feedback()
	{
	  $name=$this->input->post('name');
      $email=$this->input->post('email');
	  global $send;
      $send['mail']=$this->load->module('theme/theme')->get_page(20,'text');
      $send['mailtext']=$name.'<br>'.$email.'<br><br>'.$this->input->post('mess');
      $send['title']='Обратная связь';
      require($_SERVER['DOCUMENT_ROOT']."/other/mail.php");

      echo 'ok';
	}
}

?>