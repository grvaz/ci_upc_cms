<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Pdfarchive extends Front
{


    function __construct()
    {
        MX_Controller::__construct();

        $this->load->module('theme');

        $this->load->model('pdfarchive_model');

    }

	public function list_pdfs()
	{

    if(!isset($_GET['year'])){$_GET['year']=0;}
    if(!isset($_GET['np_num'])){$_GET['np_num']=0;}

	  $data=$this->pdfarchive_model->get_list($_GET['year'],$_GET['np_num']);
      $data['years']=$this->pdfarchive_model->get_all_years();
      $data['npnums']=$this->pdfarchive_model->get_all_pdfs();
      $data['pagenav']=$this->pdfarchive_model->pagenav->get_links();
	  $content=$this->load->view('pdfarchive_view',$data,true);
     $this->theme->show($content, $data);
	}

    public function block()
    {
    $array=$this->pdfarchive_model->get_newest();
    $data['row']=current($array['rows']);
    $data['img']=current($array['imgs']);
    return $this->load->view('pdf_newest_view',$data,true);
    }
}
?>