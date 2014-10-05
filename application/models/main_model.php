<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->module('common');
    }

    function test()
    {
        return array('data'=>array('23435','456456','56567'));
    }
}
?>