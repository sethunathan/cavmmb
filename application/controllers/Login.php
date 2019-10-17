<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
        $this->load->library('session');
	    $this->load->helper('url');
    }
   
    public function index() {
		 if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url();
           // header("Location: " . $target);
        }
		
		$clientId = '411998643622-i1t7ne36aq2q2c10qhsv6069nqv5tdlh.apps.googleusercontent.com';  
		$clientSecret = 'O_nmLUqHkwmy-jBdeNpthG0z'; 
		$redirectURL = 'http://cavmmb.com/login'; 		
		if(isset($_GET['code']))
		{
			    $data =  $this->GetAccessToken($clientId , $redirectURL, $clientSecret, $_GET['code']);
			    $user_info = $this->GetUserProfileInfo($data['access_token']);
			    $email= $user_info['email']; 
				$this->auth($email);
				 $this->session->set_userdata('loggedin', true);
		}	
          if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url();
            header("Location: " . $target);
        }		
        //$this->load->view('login',$data);    
    }
	

	public function auth($email)
    {
	    $this->db->where('active', 1);
		$this->db->where('email', $email);	
		
		$data['users']= $this->db->get('masemp');
        if($data['users']->num_rows()>0)
		   {
			   foreach($data['users']->result() as $row)
			   {
			       $admin = $row->isadmin;	
                   $username = $row->username;
                   $emp_code = $row->emp_code;					   
                   $branchcode = $row->branch_code;
                   $groupcode = $row->groupcode;				   
			       $this->session->set_userdata('loggedin', true);
				   $this->session->set_userdata('admin',$admin);
				   $this->session->set_userdata('branchcode',$branchcode);
				   $this->session->set_userdata('groupcode',$groupcode);
				   $this->session->set_userdata('emp_code',$emp_code);
				   $this->session->set_userdata('chatusername',$username);
				   $this->session->set_userdata('username',$username);
                   $branch_code=$this->session->userdata('branchcode');		
		           $emp_code = $this->session->userdata('emp_code');
		           $current_datetime=date("Y-m-d");
		           redirect(base_url() . 'admin\main');	
			    }
		    }	
        else
        {
            redirect(base_url() . 'login');
        }
    }
    public function showdetial()
	{
	 
		$branch_code=$this->session->userdata('branchcode');		
		$emp_code = $this->session->userdata('emp_code');
	 
		$this->db->where('group_code', $branch_code);
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 0);
		 
		$this->db->where('followupassignto', $emp_code);
		
		$this->db->distinct();	
        $this->db->where('starting_date<=', $current_datetime);	
		$this->db->order_by('followupassigntoorder,subjobname,trntask1.task_code');
	    //$this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('followupassignto,ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['showdetail'] = $this->db->get('massubjob')->result_array();
		return $data['showdetail'];
	}
    public function logout()
    {
        $this->session->unset_userdata('loggedin');
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('groupcode');
		$this->session->unset_userdata('branchcode');
		$this->session->unset_userdata('emp_code');
        //$this->load->view('login');
		 redirect(base_url() . 'login');
	}
	
	function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
	$url = 'https://www.googleapis.com/oauth2/v4/token';			

	$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
	$ch = curl_init();		
	curl_setopt($ch, CURLOPT_URL, $url);		
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
	curl_setopt($ch, CURLOPT_POST, 1);		
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);	
	$data = json_decode(curl_exec($ch), true);
	 
	$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
	if($http_code != 200) 
		throw new Exception('Error : Failed to receieve access token');
	
	return $data;
} 
    public function GetUserProfileInfo($access_token) {	
		$url = 'https://www.googleapis.com/oauth2/v2/userinfo?fields=name,email,gender,id,picture,verified_email';	
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to get user information');
			
		return $data;
	}
		
}

