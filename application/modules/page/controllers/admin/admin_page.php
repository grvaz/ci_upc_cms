<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Admin_page extends Admin {

public $page=array();
public $hmenu=array('index/index'=>'Список', 'ed'=>'Страница');


    function __construct()
    {
        MX_Controller::__construct();
        $this->load->model('page/page_model');

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
      return $this->mod_list('page', 'header asc', 8, 'page', 'extpage');
	}

    public function hmenu()
	{
	  if($this->uri->segment(4)=='edit'){
      return rename_key('ed','ed/edit/'.$this->uri->segment(5).'/'.$this->uri->segment(6),$this->hmenu);
      }
      unset($this->hmenu['ed']);
      return $this->hmenu;
	}

    public function url_permitted_methods()
	{
      return array('index','del','edit','save');
	}



    public function edit()
	{

    //$rrtyt=$this->common_model->test();

    $id=(int)$this->uri->segment(5);
    $subpage_of=(int)$this->uri->segment(6);
    $data=$this->page_model->get_page_data($id);

    if(!isset($data['editor'])){$data['editor']=1;}

    $this->html_head($this->load->view('page/admin/edit_head_view',$data,true));
    $data['subpage_of']=$subpage_of;
    $data['came_from']=$this->session->userdata('came_from');

    // Выводим блок модуля изображений
    $data['imgs']=$this->admin_imgs->img_list($id);

    return $this->load->view('page/admin/edit_view',$data,true);

	}

    public function save()
	{
	  if(!isset($_POST['edit']['id'])){
        redirect('/admin/page');
	  }
	  $header=trim($_POST['edit']['header']);
      if(empty($header)){$_POST['edit']['header']='Noname';}
	$data=$this->input->post('edit');
    $data['type']='page';  $data['subtype']='extpage';

    if(!isset($data['editor'])){$data['editor']=0;}

    $id=$this->common_model->db_ins_upd('page','id',$data);

    $this->page_model->_chpu($data['chpu'], $id);

    // Приркрепляем / удаляем изображения
    $this->admin_imgs->save($id);

    redirect('/admin/page/ed/edit/'.$id.'/'.$data['subpage_of']);
	}


    public function del()
	{
    $this->page_model->del_pages($this->input->get('id'));

    $deleted=$this->page_model->deleted_pages();

    // Удалйем все изображения, связанные с удаляемым материалом
     $data['imgs']=$this->admin_imgs->del_by_elemids($deleted);

    redirect('/admin/page');
    }
}

?>