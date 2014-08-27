<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Base_Controller extends MX_Controller
{

   function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Novosibirsk');
        
    }

   public function index()
   {
     return;
   }

   public function megotest()
   {
     echo 'yeeeeeeeap!!!';
   }
}