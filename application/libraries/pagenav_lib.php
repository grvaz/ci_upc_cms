<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Pagenav_lib
{

public $CI='';

public $config_base_url = '';
public $config_total_rows = 0;
public $config_per_page = 0;
public $config_page_query_string = TRUE;

public $start=0;
public $finish=0;

function __construct($conf)
    {
    $this->CI=& get_instance();
    $this->CI->load->library('pagination');
    $this->CI->pagination->first_link='&lsaquo; Первая';
    $this->CI->pagination->last_link='Последняя &rsaquo;';
    $this->config_total_rows=$conf['count'];
    $this->config_per_page=$conf['perpage'];
    $this->config_base_url=cut_uri_arg(array('per_page'),req_uri_q());

    $config['base_url']=$this->config_base_url;
    $config['total_rows']=$this->config_total_rows;
    $config['per_page'] = $this->config_per_page;
    $config['page_query_string'] = $this->config_page_query_string;

    if(!isset($_GET['per_page'])){$_GET['per_page']=0;}
    $this->start=(int)$_GET['per_page'];
    $this->finish=(int)$this->config_per_page;

    $this->CI->pagination->initialize($config);


    }

    public function get_links()
    {
    return $this->CI->pagination->create_links();
    }


}

?>