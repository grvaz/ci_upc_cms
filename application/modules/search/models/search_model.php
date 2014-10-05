<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Search_model extends Common_Model {

    public function __construct()
    {
        parent::__construct();
    }



    public function get_search_results($search)
	{
	  $this->db->like('header', $search);
      $this->db->or_like('text', $search);
      $this->db->limit(20);
      $query=$this->db->get('page');

      $this->load->model('imgs/imgs_model');

      return $this->imgs_model->imgs_to_table($query->result_array(), 'page');
	}


}

?>