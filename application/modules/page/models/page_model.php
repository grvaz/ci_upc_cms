<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Page_model extends Common_model {

public $page=array();
public $deleted_pages=array();

    public function __construct()
    {
        parent::__construct();
    }


    public function get_page_data($id)
    {
     $this->db->where('id',$id);
     $query=$this->db->get('page');
     if($query->num_rows()>0){
     return $query->row_array();
     }else{
     return array('id'=>0);
     }
    }

    public function _chpu($chpu, $id)
    {
     $chpu_e=$this->db->escape($chpu); $chpu_e2=$this->db->escape($chpu.'/'); $id=(int)$id;
     $query=$this->db->query("select id from page where (chpu=$chpu_e or chpu=$chpu_e2) and id!=".$id);
     if($query->num_rows()>0){
     $data['chpu']='page/'.$id;
     }else{
     $data['chpu']=$chpu;
     }
     $data['id']=$id;
     $this->common_model->db_ins_upd('page','id',$data);
    }

    public function del_pages($id)
    {
     $this->db->where('id',$id);
     $this->db->delete('page');

     $this->deleted_pages[$id]=$id;

     $this->db->where('subpage_of',$id);
     $query=$this->db->get('page');
     if($query->num_rows()>0){
     foreach ($query->result() as $row)
        {
        $this->del_pages($row->id);
        }
    }
    }

    public function deleted_pages()
    {
    $dp=$this->deleted_pages;
    $this->deleted_pages=array();
    return $dp;
    }



    public function chpu(){
      if($this->uri->uri_string=='' or $this->uri->uri_string=='/'){
        $uri_str='main';
      }else{
        $uri_str=$this->uri->uri_string;
      }
        $this->db->where('chpu',$uri_str);
        $this->db->or_where('chpu',$uri_str.'/');
        $query=$this->db->get('page');
        return $query->row_array();
    }



}

?>