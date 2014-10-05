<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Imgs_model extends Common_model {


    function __construct()
    {
        parent::__construct();

    }

	public function get_imgs($to_table, $element_id)
    {
    $this->db->where('to_table', $to_table);
    $this->db->where('element_id', $element_id);
    $this->db->order_by('weight', 'asc');
    $query=$this->db->get('imgs');
    if($query->num_rows()>0){
     foreach($query->result_array() as $row){
       $array[$row['id']]=$row;
      }
     return $array;
     }else{
     return array();
     }
    }

     public function imgs_to_table($result_array, $to_table)
     {
        $img_arr=array();

        foreach($result_array as $row){
        $img_arr[$row['id']]=$this->get_imgs($to_table, $row['id']);
        }

        return array('rows'=>$result_array, 'imgs'=>$img_arr);
     }
}

?>