<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Accountslogin extends CI_Controller {

	public function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
       // $this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');
    }

    public function index() {
 
       $this->load->view('accountslogin');    
    }
	

	public function auth()
    {
		 if (!$this->session->userdata('accountsloggedin'))
        {	
			$target= base_url().'accountslogin';
            header("Location: " . $target);
        }
		
        $username=$this->input->post('username'); 
	    $password=$this->input->post('password');
	   
	    $this->db->where('active', 1);
	    $this->db->where('password', $password);
		$this->db->where('username', $username);	
		
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
			       $this->session->set_userdata('accountsloggedin', true);
				   $this->session->set_userdata('accounts',$admin);				   
				   $this->session->set_userdata('branchcode',$branchcode);
				   $this->session->set_userdata('groupcode',$groupcode);
				   $this->session->set_userdata('emp_code',$emp_code);
				   $this->session->set_userdata('username',$username);				
                   $branch_code=$this->session->userdata('branchcode');		
		           $emp_code = $this->session->userdata('emp_code');			 
			   }
			 $this->load->view('accountsadmin');
		   }	
		
        else
        {
            redirect(base_url() . 'accountslogin');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('accountsloggedin');
		$this->session->unset_userdata('accounts');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('groupcode');
		$this->session->unset_userdata('branchcode');
		$this->session->unset_userdata('emp_code');
        $this->load->view('accountslogin');
		}
		
}

