<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
       // $this->output->set_header('Pragma: no-cache');
       // $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
        
        $this->load->library('session');	  
        $this->load->helper('url');
		$this->load->library("pagination");
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
		date_default_timezone_set('Asia/Kolkata');
        
    }
	
	public function index() {		
        $this->load->view("changepassword");
    }
	public function savemerge() {
		
	 
        $password= $_POST['password'];  		
        $emp_code = $this->session->userdata('emp_code');
      		
        $strSQL="update masemp set password ='". $password."'	where emp_code=". $emp_code."";
        $this->db->query($strSQL);  
        
       
		 	
		echo '<script language="javascript">';
echo 'alert("Changed successfully!!! ")';
echo '</script>';
      redirect(base_url() . 'login');
		
    }

	
	

	
	 
	 		
	
	}
 
?>