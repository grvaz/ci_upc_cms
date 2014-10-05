<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Search extends Base_controller {



    function __construct()
    {
        MX_Controller::__construct();
        $this->load->model('search_model');
    }

    public function site_search()
    {
      $search=$this->input->post('search');
      $data=$this->search_model->get_search_results($search);
      $content=$this->load->view('theme/search_view',$data,true);
      $this->load->module('theme')->show($content, array());
    }
}

?>