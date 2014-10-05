<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Articles extends Front {

public $page=array();


    function __construct()
    {
        MX_Controller::__construct();

        $this->load->module('theme');
        
        $this->load->model('articles_model');


    }

	public function show_article($opts)
	{
	  $this->page=$this->articles_model->get_article($opts['type']);
        if(empty($this->page)){
            show_404('page');
            exit;}

      $this->page['img_list']=$this->load->module('imgs')->imgs_list('page', $this->page['id']);


      $this->page['main_img']=current($this->page['img_list']);
      unset($this->page['img_list'][$this->page['main_img']['id']]);

      $this->page['cat_npnum']=$this->articles_model->get_curr_cat_npnum($this->page['id']);

	  $content=$this->load->view('theme/page_view',$this->page,true);

      $data['meta_title']=$this->page['meta_title'];
      $data['meta_description']=$this->page['meta_description'];
      $data['meta_keywords']=$this->page['meta_keywords'];

      $this->theme->show($content, $data);
	}

    public function list_articles($opts)
	{
       $content='';
      //echo $opts['type'];

      $cont_data['type_txt']=$opts['type_txt'];
      $cont_data['type']=$opts['type'];

            if(isset($opts['arc'])){
      $cont_data['articles']=$this->articles_model->get_arc_articles($opts['type'], $this->uri->segment(3));
            }elseif(isset($opts['cat'])){
      $cont_data['articles']=$this->articles_model->get_cat_articles($opts['type'], $this->uri->segment(3));
      $cont_data['one_curr_cat']=$this->articles_model->get_cat_data((int)$this->uri->segment(3));
      if($this->uri->segment(3)==0){$cont_data['one_curr_cat']=array('id'=>0, 'name'=>'Прочее');}
            }elseif(isset($opts['all'])){
      $tday=$this->theme_of_day();
      $cont_data['articles']=$this->articles_model->get_last_articles(false,$tday['id']);
      $content=$tday['content'];
            }else{
      $cont_data['articles']=$this->articles_model->get_last_articles($opts['type']);
           }

      $cont_data['pagenav']=$this->articles_model->pagenav->get_links();

      $content.=$this->load->view('theme/articles_news_view',$cont_data,true);

      $data=array();

      $this->theme->show($content, $data);
	}

    public function ajax_calendar()
	{
     echo $this->articles_model->check_calendar_date($this->input->post('date'), $this->input->post('subtype'));
    }



    public function calendar_block()
	{

     $head=$this->load->view('theme/calendar_head_view','',true);
     $head.=$this->theme->get_head();

     $this->theme->set_head($head);
     return $this->load->view('theme/calendar_view','',true);
	}

    public function articles_cat_block()
	{
     $cats=$this->articles_model->get_category();
     $data['cats']=$cats[$this->uri->segment(1)];
     $data['cats'][]=array('id'=>0, 'name'=>'Прочее');
     $data['cats']=$this->articles_model->count_arts_in_cat($data['cats'], $this->uri->segment(1));
     return $this->load->view('theme/articles_cat_view',$data,true);

	}

    public function theme_of_day()
	{
	 $data=$this->articles_model->get_theme_of_day();

     if(!empty($data[0])){
     $array['content']=$this->load->view('theme/theme_of_day_view',array('page'=>$data[0][0], 'img'=>current($data[1])),true);
     $array['id']=$data[0][0]['id'];
     return $array;
                         }

     return array('content'=>'', 'id'=>0);
	}
}

?>