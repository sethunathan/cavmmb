<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//vmmbcapdm@gmail.com//thirivasagam12
class Api extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
      
        $this->load->library('session');	  
        $this->load->helper('url');       
        
    }
	public function login_api_ci()
	{
    // $email =   $this->input->get('email');
    // $pass =    $this->input->get('password');
     //$query = $this->login_api($email,$pass);
	    $response = array();
	    $user = array(
				    'id'=>'sethu', 
					'username'=>'sethu', 
					'email'=>'sethu',
					'gender'=>'sethu'
						);
						
		$response['error'] = false; 
		$response['message'] = 'Login successfull'; 
		$response['user'] = $user; 
       echo json_encode($response);
    }
    public function login_api($username,$password)
	{
    //   $query = $this->db->query("SELECT * FROM `host_users` WHERE `email` = '$username' AND `password` = '$password'");
     //  return $query->result_array();
     }
	public function indexc()

	{
	    $response = array();
	    if(isset($_GET['apicall']))
		 {
		    switch($_GET['apicall'])
			{			
			
			case 'login':
				$user = array(
				    'id'=>'sethu', 
					'username'=>'sethu', 
					'email'=>'sethu',
					'gender'=>'sethu'
						);
						
						$response['error'] = false; 
						$response['message'] = 'Login successfull'; 
						$response['user'] = $user; 
					
				
			break; 			
			default: 
				$response['error'] = true; 
				$response['message'] = 'Invalid Operation Called';
		    }
		
	}
	else
	  {		 
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	  }
	
	
	echo json_encode($response);
	
	}
   
	
	
	
	}