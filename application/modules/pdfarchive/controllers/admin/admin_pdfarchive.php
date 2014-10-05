<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Admin_pdfarchive extends Admin {


    function __construct()
    {
        MX_Controller::__construct();

        $this->load->model('pdfarchive_model');

        // Подключаем модуль изображений и создаём массив параметров
        $this->load->module('imgs/admin/admin_imgs');
        $config['path']='./uploads/';
        $config['to_table']='pdfarchive';
        $config['thumbs_opts']=array(
        array('w'=>182, 'h'=>212, 'type'=>'crop')
        );
        // Заносим параметры
        $this->admin_imgs->set_params($config);

    }


    public function hmenu()
	{
      return array('index/index'=>'Номера');
	}

    public function url_permitted_methods()
	{
      return array('index','edit','save','del');
	}

    public function index()
    {
      return $this->mod_list('pdfarchive', "UNIX_TIMESTAMP(STR_TO_DATE(`date`,'%d.%m.%Y')) desc", 8, '', '', 0, 'pdfarchive/admin/list_view');
    }

    public function edit()
	{
    $id=(int)$this->uri->segment(5);
    $data=$this->pdfarchive_model->get_pdf_data($id);

    // Выводим блок модуля изображений
    $data['imgs']=$this->admin_imgs->img_list($id);

    $data['came_from']=$this->session->userdata('came_from');

    if(!file_exists('./uploads/pdfarchive/'.$id.'.pdf')){
      $data['exists']='<span style="color: #CC0000">PDF ещё не загружен</span>';
    }else{
      $data['exists']='<span style="color: #006600">PDF загружен</span>';
    }

    //$this->html_head($this->load->view('admin/edit_js_view','',true));
    //echo '<div style="position: absolute; z-index: 9999; background-color: #FFFFFF; color: #000000; font-weight: bold; font-size: 12px; padding: 5px; text-align: left"><pre><span style="background-color: #FFFFFF;">'; print_r($this->pdfarchive_model->get_all_years()); echo '</span></pre></div>';

    return $this->load->view('admin/edit_view',$data,true);
    }

    public function save()
	{
	  if(!isset($_POST['edit']['id'])){
        redirect('/admin/pdfarchive');
	  }
	  //$header=trim($_POST['edit']['title']);
      //if(empty($header)){$_POST['edit']['title']='Noname';}
	$data=$this->input->post('edit');


    $id=$this->common_model->db_ins_upd('pdfarchive','id',$data);


    // Приркрепляем / удаляем изображения
    $this->admin_imgs->save($id);

    $this->save_pdf($id);

    redirect('/admin/pdfarchive/index/edit/'.$id);
	}

    public function save_pdf($id)
    {

    if($_FILES['pdf']['type']!='application/pdf' or $_FILES['pdf']['size']==0){
      if(file_exists($_FILES['pdf']['tmp_name'])){
      unlink($_FILES['pdf']['tmp_name']);
       }
      return;
}

      if(file_exists('./uploads/pdfarchive/'.$id.'.pdf')){
      unlink('./uploads/pdfarchive/'.$id.'.pdf');
       }

       move_uploaded_file($_FILES['pdf']['tmp_name'], './uploads/pdfarchive/'.$id.'.pdf');
    }


    public function del()
	{
    $this->common_model->del_by_id('pdfarchive','id',$this->input->get('id'));

     // Удалйем все изображения, связанные с удаляемым материалом
     $this->admin_imgs->del_by_elemids(array($this->input->get('id')));

     if(file_exists('./uploads/pdfarchive/'.$this->input->get('id').'.pdf')){
      unlink('./uploads/pdfarchive/'.$this->input->get('id').'.pdf');
       }


     redirect('/admin/pdfarchive');
    }

}


?>