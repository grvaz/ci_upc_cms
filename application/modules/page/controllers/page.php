<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Page extends Front {

public $page=array();


    function __construct()
    {
        MX_Controller::__construct();

         $this->load->module('theme');

        $this->load->model('page_model');
        $this->page=$this->page_model->chpu();
        if(empty($this->page)){
            show_404('page');
            exit;}
    }

	public function index()
	{
	  $this->page['img_list']=$this->load->module('imgs')->imgs_list('page', $this->page['id']); 



      $this->page['main_img']=current($this->page['img_list']);
      unset($this->page['img_list'][$this->page['main_img']['id']]);

	  $content=$this->load->view('theme/page_view',$this->page,true);

      $data['meta_title']=$this->page['meta_title'];
      $data['meta_description']=$this->page['meta_description'];
      $data['meta_keywords']=$this->page['meta_keywords'];

      $this->theme->show($content, $data);
	}
}

?>