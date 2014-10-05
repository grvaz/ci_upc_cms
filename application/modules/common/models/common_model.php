<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Common_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function db_ins_upd($table, $field, $arr)
    {

     $arr=array_map('trim', $arr);

      if($arr[$field]){
        $this->db->where($field, $arr[$field]);
        $this->db->update($table, $arr);
        return $arr[$field];
      }else{
        $this->db->insert($table, $arr);
        return $this->db->insert_id();
      }
    }

    public final function del_by_id($table, $id_name, $id)
    {

    $this->db->where($id_name, $id);
    $this->db->delete($table);

    }

    public function update_field_by_val($table, $field, $old_val, $new_val)
    {
        $this->db->where($field, $old_val);
        $arr=array($field=>$new_val);
        $this->db->update($table, $arr);
    }

    public function get_page_blocks($pages)
	{
	  $array=array();
	  foreach($pages as $id){
	    $this->db->where('id', $id);
        $query=$this->db->get('page');
        if ($query->num_rows() > 0){
         $row=$query->row_array();
         $array[$id]['head']=$row['header'];
         $array[$id]['text']=$row['text'];
        }
	  }
      return $array;
	}

    public function set_chpu($id, $chpu)
	{
	  $this->db_ins_upd('page', 'id', array('id'=>$id, 'chpu'=>$chpu));
	}
}

?>