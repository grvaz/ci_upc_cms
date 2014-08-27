<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Admin_articles extends Admin {

public $page=array();
public $addtype='';


    function __construct()
    {
        MX_Controller::__construct();
        $this->load->model('articles/articles_model');

        // Подключаем модуль изображений и создаём массив параметров
        $this->load->module('imgs/admin/admin_imgs');
        $config['path']='./uploads/';
        $config['to_table']='page';
        $config['thumbs_opts']=array(
        array('w'=>320, 'h'=>240, 'type'=>'height')
        );
        // Заносим параметры
        $this->admin_imgs->set_params($config);
    }



	public function index()
	{
      return;
	}

    public function hmenu()
	{
      return array('news/news'=>'Новости', 'articles/artlist'=>'Статьи','category/catlist'=>'Категории');
	}

    public function url_permitted_methods()
	{
      return array('news','edit_cat','save_cat','del_cat','artlist','catlist','del','edit','save');
	}

    public function news()
	{
    $this->addtype='news';
    return $this->mod_list('page', 'header asc', 8, 'article', 'news',0,'articles/admin/articles_list_view');

	}

    public function artlist()
	{
	  $this->addtype='articles';
      return $this->mod_list('page', 'header asc', 8, 'article', 'articles',0,'articles/admin/articles_list_view');
	}

    public function edit_cat()
	{
    $id=(int)$this->uri->segment(5);
    $data=$this->articles_model->get_cat_data($id);
    $this->html_head($this->load->view('articles/admin/edit_head_view','',true));

    $type_arr=array('news'=>'Новости', 'articles'=>'Статьи');
    if(isset($_GET['type'])){
      $data['type_']=$type_arr[$this->input->get('type')];
      $data['type']=$this->input->get('type');
    }else{
      $data['type_']=$type_arr[$data['type']];
    }

    return $this->load->view('articles/admin/edit_cat_view',$data,true);
	}

     public function save_cat()
	{
	  if(!isset($_POST['edit']['id'])){
        redirect('/admin/articles/category/catlist');
	  }
	  $header=trim($_POST['edit']['name']);
      if(empty($header)){$_POST['edit']['name']='Noname';}
	$data=$this->input->post('edit');
    //$data['type']='page';  $data['subtype']='extpage';
    $id=$this->common_model->db_ins_upd('articles_category','id',$data);

    redirect('/admin/articles/category/edit_cat/'.$id);
	}

    public function save()
	{
	  if(!isset($_POST['edit']['id'])){
        redirect('/admin/articles');
	  }
	  $header=trim($_POST['edit']['header']);
      if(empty($header)){$_POST['edit']['header']='Noname';}
	$data=$this->input->post('edit');
    $data['type']='article';

    if((int)$data['id']==0){
    $data['timestamp']=time();
    }

    if(!isset($data['editor'])){$data['editor']=0;}

    $id=$this->common_model->db_ins_upd('page','id',$data);

    $data2['page_id']=$id;
    $data2['cat_id']=$this->input->post('cat');
    $data2['type']=$data['subtype'];
    $this->articles_model->set_cat_rel($data2);

    //Прописываем номер газеты
    if($data['subtype']=='articles'){
    $data3['page_id']=$id;
    $data3['np_num']=$this->input->post('np_num');
    $this->common_model->db_ins_upd('articles_rel','page_id',$data3);
    }

    // Приркрепляем / удаляем изображения
    $this->admin_imgs->save($id);

    redirect('/admin/articles/'.$data['subtype'].'/edit/'.$id);
	}

    public function del_cat()
    {

     $this->common_model->del_by_id('articles_category','id',$this->input->get('id'));


     $this->common_model->update_field_by_val('articles_rel','cat_id',$this->input->get('id'),0);

     redirect('/admin/articles/category/catlist');

    }

    public function catlist()
	{
     $array=$this->articles_model->get_category();
     $data['news']=$array['news'];
     $data['articles']=$array['articles'];

     return $this->load->view('articles/admin/category_view',$data,true);

	}

    public function edit()
	{
    $id=(int)$this->uri->segment(5);
    $data=$this->articles_model->get_article_data($id);
    $data['cats']=$this->articles_model->get_category();
    $data['cats']=$data['cats'][$this->uri->segment(3)];
    $cat_npnum=$this->articles_model->get_curr_cat_npnum($id);
    $data['curr_cat']=$cat_npnum['cat_id'];
    $data['np_num']=$cat_npnum['np_num'];

    if(!isset($data['editor'])){$data['editor']=1;}

    $this->html_head($this->load->view('page/admin/edit_head_view',$data,true));
    $data['came_from']=$this->session->userdata('came_from');
    $data['rus_type']=array('articles'=>'статьи','news'=>'новости');

    // Выводим блок модуля изображений
    $data['imgs']=$this->admin_imgs->img_list($id);

    return $this->load->view('articles/admin/edit_view',$data,true);
    }

    public function del()
	{
    $this->common_model->del_by_id('page','id',$this->input->get('id'));
    $this->common_model->del_by_id('articles_rel','page_id',$this->input->get('id'));

     // Удалйем все изображения, связанные с удаляемым материалом
     $data['imgs']=$this->admin_imgs->del_by_elemids(array($this->input->get('id')));

     if($this->uri->segment(5)=='articles'){
       $tofunc='artlist';}else{
       $tofunc='news';
     }
     redirect('/admin/articles/'.$this->uri->segment(5).'/'.$tofunc);
    }
}

?>