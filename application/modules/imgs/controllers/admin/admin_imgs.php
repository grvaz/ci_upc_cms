<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Admin_imgs extends Admin {

  public $path='';
  public $to_table='';
  public $thumbs_opts=array();
  public $orig=false;
  private $permitted=array('jpg'=>'image/jpeg', 'gif'=>'image/gif', 'png'=>'image/png');
  private $thumb1=array('w'=>200, 'h'=>100, 'type'=>'crop');
  private $del_arr=array('big', 'thumb1', 'thumb2', 'thumb3', 'thumb4');

    function __construct()
    {
        MX_Controller::__construct();
        
        $this->load->model('imgs/imgs_model');
        $this->html_head($this->load->view('imgs/admin/head_view', '', true));

    }

	public function index()
	{
      return;
	}

    public function hmenu()
	{
      return array();
	}

    public function url_permitted_methods()
	{
      return array();
	}

    public function img_list($element_id)
	{
      $data['img_list']=$this->imgs_model->get_imgs($this->to_table, $element_id);
      return $this->load->view('imgs/admin/list_view', $data, true);
	}

    public function set_params($config)
	{

    foreach($config as $param=>$val){
      $this->$param=$val;
    }

	}

    public function save($element_id)
	{

    array_unshift($this->thumbs_opts, $this->thumb1);

    $this->del_checked($element_id);

    foreach($_FILES['imgs']['type'] as $key=>$val){
      if($_FILES['imgs']['size'][$key]==0){continue;}
      //Пропускаем недопустимые типы
      if(!in_array($val, $this->permitted)){
      unlink($_FILES['imgs']['tmp_name'][$key]);
      continue;
        }

     $ext=array_flip($this->permitted);

     $data['id']=0;
     $data['to_table']=$this->to_table;
     $data['element_id']=$element_id;
     $data['orig_ext']=$ext[$_FILES['imgs']['type'][$key]];
     $data['img_path']=$this->path;
     $id=$this->common_model->db_ins_upd('imgs','id',$data);

     $this->add_img($id, $key, $element_id);

     }
      $this->update();
	}

    private function add_img($id, $picnum, $element_id)
    {

    foreach($this->thumbs_opts as $key=>$thumb){

$picname='thumb'.($key+1).'_'.$id.'_'.$this->to_table.'_'.$element_id.'.jpg';

    if($thumb['type']=='crop'){

resize_crop_image($thumb['w'],$thumb['h'],$_FILES['imgs']['tmp_name'][$picnum],$this->path.$picname);

    }else{

      switch($thumb['type']){
      case 'width': $thumbtypenum=2; break;
      case 'height': $thumbtypenum=1; break;
      case 'auto': $thumbtypenum=0; break;
        }

img_resize($_FILES['imgs']['tmp_name'][$picnum], $this->path.$picname, $thumb['w'], $thumb['h'], $thumbtypenum);

        }

      }

$bigpicname='big'.'_'.$id.'_'.$this->to_table.'_'.$element_id.'.jpg';
img_resize($_FILES['imgs']['tmp_name'][$picnum], $this->path.$bigpicname, 1200, 1200, 0);

if(file_exists($_FILES['imgs']['tmp_name'][$picnum])){
      unlink($_FILES['imgs']['tmp_name'][$picnum]);
        }

    }

    public function del_checked($element_id)
    {
    if(empty($_POST['imgs_del'])){return;}

    $list=$this->imgs_model->get_imgs($this->to_table, $element_id);

    foreach($this->input->post('imgs_del') as $bad_img){
     $this->common_model->del_by_id('imgs','id',$bad_img);

     foreach($this->del_arr as $del){

      $picname=$del.'_'.$bad_img.'_'.$this->to_table.'_'.$element_id.'.jpg';

      if(file_exists($list[$bad_img]['img_path'].$picname)){
      unlink($list[$bad_img]['img_path'].$picname);
       }

      }

     }
    }

    public function del_by_elemids($arr)
    {

    if(empty($arr)){return;}

    foreach($arr as $element_id){
    $list=$this->imgs_model->get_imgs($this->to_table, $element_id);

     foreach($list as $id=>$row){
      $this->common_model->del_by_id('imgs','id',$id);

       foreach($this->del_arr as $del){

      $picname=$del.'_'.$id.'_'.$this->to_table.'_'.$element_id.'.jpg';

      if(file_exists($list[$id]['img_path'].$picname)){
      unlink($list[$id]['img_path'].$picname);
        }

       }


      }

     }

    }

    private function update()
    {
      if(empty($_POST['imgs_weight'])){return;}
      foreach($this->input->post('imgs_weight') as $id=>$val){
     $data['id']=$id;
     $data['weight']=(int)$val;
     $this->common_model->db_ins_upd('imgs','id',$data);
     }
    }
}


?>