<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Theme extends Base_Controller {

private $head=''; // css, js в <head></head>

public $weekdays=array('Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота');

public $month=array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');


    function __construct()
    {
        MX_Controller::__construct();
        $this->load->model('theme_model');

        $this->set_head($this->load->view('head_view','',true));
    }

	public function show($content, $data)
	{



      if(empty($data['meta_title'])){
      $data['meta_title']=$this->get_page(10,'text');
      }

      $data['content']=$content;


       // Грузим блоки, относящиеся к статьям/новостям
       if($this->uri->segment(1)=='articles' or $this->uri->segment(1)=='news')
{
      $data['calendar_block']=$this->articles->calendar_block();
      $data['articles_cat_block']=$this->articles->articles_cat_block();
}

      $data['weather_informer_block']=$this->load->view('weather_block_view', '', true);

      $data['pdf_newest_block']=$this->load->module('pdfarchive')->block();

      $data['head']=$this->head;

      

	  $this->load->view('index_view', $data);
	}
    
    public function set_head($str)
    {
    $this->head=$str;
    }
    public function get_head()
    {
    return $this->head;
    }

    public function get_page($id, $part)
    {
    $page=current($this->common_model->get_page_blocks(array($id)));
    return $page[$part];
    }
}

?>