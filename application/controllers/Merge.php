<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merge extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
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
        $this->load->view("merge");
    }
	public function savemerge() {
		
	  	$fromtask= $_POST['taskfrom']; 	
		$totask= $_POST['taskto'];
        $task_name= $_POST['taskname'];  		

      		
        $strSQL="update trntask1 set task_name ='". $task_name."'	where task_code=". $totask."";
        $this->db->query($strSQL);  
        
        $strSQL="delete from trntask1  	where task_code=". $fromtask."";
        $this->db->query($strSQL);  		
        
		$strSQL="update trntask2 set task_code ='". $totask."'	where task_code=". $fromtask."";  
	    $this->db->query($strSQL);  
        $strSQL="update trntask3 set task_code ='". $totask."'	where task_code=". $fromtask."";  		 
        $this->db->query($strSQL);  		
		 
        	 
			
			 
		echo '<script language="javascript">';
echo 'alert("merged successfully!!! ")';
echo '</script>';
        $this->load->view("merge");
		
    }

	
	

	
	 
	 		
	
	}
 
?>