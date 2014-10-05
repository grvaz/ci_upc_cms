<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Admin_model extends CI_Model {

public $page=array();


    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{ 
	  return;
	}

    public function mod_list($table, $order, $perpage, $type='', $subtype='', $subpage=0)
	{
      if($type){
        return $this->_mod_list_page($table, $order, $perpage, $type, $subtype, $subpage);
      }else{
        return $this->_mod_list_other($table, $order, $perpage);
      }
	}

    public function _mod_list_page($table, $order, $perpage, $type='', $subtype='', $subpage=0)
	{

     $array=array();
     $array['pages']=array();

     $query=$this->db->query("select count(*) from `$table` where `type`='$type' and `subtype`='$subtype' and `subpage_of`='".(int)$subpage."'");
     $array['count']=current($query->row_array());

     $pagenav=$this->load->library('pagenav_lib',array('count'=>$array['count'],'perpage'=>$perpage));

     $array['above_page']=array();
     if((int)$subpage>0){
     $query=$this->db->query("select subpage_of, header, chpu, id from `$table` where `id`='".(int)$subpage."'");
     $array['above_page']=$query->row_array();
                        }
     $array['above_page']['add_new']=(int)$subpage;



     $query=$this->db->query("select * from `$table` where `type`='$type' and `subtype`='$subtype' and `subpage_of`='".(int)$subpage."' order by $order limit ".$pagenav->start.", ".$pagenav->finish);
if ($query->num_rows() > 0){
  foreach($query->result_array() as $row){
     $q=$this->db->query("select id from `$table` where `subpage_of`='".(int)$row['id']."' limit 0, 1");
     if($q->num_rows() > 0){
      $row['has_subs']=1;
     }else{
      $row['has_subs']=0;
     }
     $array['pages'][]=$row;
     }
    }

    $array['pagenav']=$pagenav->get_links();
     return $array;
	}



    public function _mod_list_other($table, $order, $perpage)
    {

     $array=array();
     $array['pages']=array();

     $query=$this->db->query("select count(*) from `$table`");
     $array['count']=current($query->row_array());

     $pagenav=$this->load->library('pagenav_lib',array('count'=>$array['count'],'perpage'=>$perpage));

     $query=$this->db->query("select * from `$table` order by $order limit ".$pagenav->start.", ".$pagenav->finish);

     $array['pages']=$query->result_array();
     $array['above_page']='';
     $array['pagenav']=$pagenav->get_links();
     return $array;
    }



}

?>