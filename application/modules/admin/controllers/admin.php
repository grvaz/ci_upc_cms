<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Admin extends Base_Controller {

public $data=array();
private static $head='';

    function __construct()
    {
        MX_Controller::__construct();

        $this->came_from();

        $this->load->model('admin_model');
        $upc_adm=$this->session->userdata('upc_adm');

        //$upc_adm=1;    // Входим без авторизации

        if(!$upc_adm){
          if($this->input->post('login')){
           $this->login(); exit;
          }else{
         $login_page=$this->load->view('login_view','',true);
         exit($login_page);
         }
        }else{
          if(isset($_GET['logout'])){
            $this->session->sess_destroy();
            redirect('/admin');
            }
        }
    }

    public function rout($vm, $hm, $method)
	{
       $_GET['vmenu']=$vm; $_GET['hmenu']=$hm;  $_GET['method']=$method;
       return $this->index();
    }

	public function index($vmenu, $hmenu, $method)
	{
      if(!$vmenu){$vmenu='page';}
      if(!$hmenu){$hmenu='index';}
      if(!$method){$method='index';}
      $adm_mod='admin_'.$vmenu;
      $this->load->module($vmenu.'/admin/admin_'.$vmenu);
      if(!class_exists('admin_'.$vmenu)){
        redirect('/admin');
      }
      $permitted=$this->$adm_mod->url_permitted_methods();
      if($method=='index'){
      $method=current($permitted);
      }
      if(!method_exists($this->$adm_mod, $method) or !in_array($method,$permitted)){
        redirect('/admin/'.$vmenu);
      }
      $this->data['content']=$this->$adm_mod->$method();
      $this->data['hmenu']=$this->$adm_mod->hmenu();
      $this->data['vmenu']=$vmenu;
      //$this->data['head']=$this->$adm_mod->head;
      $this->data['head']=self::$head;

      if($hmenu=='index'){
      $hmenu=explode('/',current(array_flip($this->data['hmenu'])));
      $hmenu=$hmenu[0];
      }

      $this->data['vmenu_']=$vmenu;
      $this->data['hmenu_']=$hmenu;

      $this->load->view('admin_view',$this->data);

	}

    public function login()
	{
     if($this->input->post('login')=='admin' and $this->input->post('pass')=='123'){
     $this->session->set_userdata('upc_adm','1');
     }
     redirect('/admin');
	}


    protected function mod_list($table, $order, $perpage, $type='', $subtype='', $subpage=0,$view='admin/mod_list_page_view')
	{
	  if($type){
        if(isset($_GET['subpage'])){$subpage=(int)$_GET['subpage'];}
      }else{

      }

      $array=$this->admin_model->mod_list($table, $order, $perpage, $type, $subtype, $subpage);


$data['pagenav']=$array['pagenav'];  
$data['rows']=$array['pages'];
$data['above_page']=$array['above_page'];
       return $this->load->view($view, $data, true);
	}

    public final function came_from()
    {
      if(isset($_GET['came_from'])){
        $this->session->set_userdata('came_from',cut_uri_arg(array('return_came_from'),urldecode($_GET['came_from'])).'&return_came_from=');
      redirect(cut_uri_arg(array('came_from'),$_SERVER['REQUEST_URI']));
      }
      if(isset($_GET['return_came_from'])){
        $this->session->unset_userdata('came_from');
        redirect(cut_uri_arg(array('return_came_from'),$_SERVER['REQUEST_URI']));
      }
    }

    public final function html_head($html, $add=true)
    {
      if($add){
    self::$head.=$html;
     }else{
    self::$head=$html;
         }
    }
}

?>
