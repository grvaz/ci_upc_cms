<?php if ( ! defined('BASEPATH')) exit('Низзя!');

class Common_lib
{

public $CI='';



function __construct()
    {
    $this->CI=& get_instance();
    $this->CI->load->model('common/common_model');
    }

function tst()
    {

    $this->CI->common_model->test();

    }


}

?>