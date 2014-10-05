<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Pdfarchive_model extends Common_model {

public $pagenav='';

    function __construct()
    {
        parent::__construct();

    }

    public function get_pdf_data($id)
    {
      $this->db->where('id', $id);
      $query=$this->db->get('pdfarchive');
      if($array=$query->row_array()){
        return $array;
      }
        return array('id'=>0, 'title'=>'');
    }

    public function get_list($year, $npnum)
    {

    $likeyear=""; $likenum="";
    if($year>0){
      $likeyear=" and `date` like '%.".(int)$year."' ";
    }
    if($npnum>0){
      $likenum=" and `np_num`='".(int)$npnum."' ";
    }

     $query=$this->db->query("select count(*) from `pdfarchive` where 1 $likeyear $likenum");
     $count=current($query->row_array());
     $pagenav=$this->load->library('pagenav_lib',array('count'=>$count,'perpage'=>6));
     //$this->db->order_by('id','desc');
     //$query=$this->db->get('pdfarchive',$pagenav->finish,$pagenav->start);
     $query=$this->db->query("select *, UNIX_TIMESTAMP(STR_TO_DATE(`date`,'%d.%m.%Y')) as tstamp from `pdfarchive` where 1 $likeyear $likenum order by tstamp desc limit ".$pagenav->start.", ".$pagenav->finish);
     $this->pagenav=&$pagenav;

     $this->load->model('imgs/imgs_model');

     return $this->imgs_model->imgs_to_table($query->result_array(),'pdfarchive');
    }

    public function get_all_pdfs()
    {
     $this->db->order_by('np_num', 'desc');
     $query=$this->db->get('pdfarchive');
     return $query->result_array();
    }

    public function get_all_years()
    {
     $query=$this->db->query("select right(`date`, 4) as year from `pdfarchive` group by year order by year desc");

     return $query->result_array();
    }

    public function get_newest()
    {

     $query=$this->db->query("select *, UNIX_TIMESTAMP(STR_TO_DATE(`date`,'%d.%m.%Y')) as tstamp from `pdfarchive` order by tstamp desc limit 0, 1");

     $this->load->model('imgs/imgs_model');

     return $this->imgs_model->imgs_to_table($query->result_array(),'pdfarchive');

    }
}

?>