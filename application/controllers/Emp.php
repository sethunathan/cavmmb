<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
      
        $this->load->library('session');	  
        $this->load->helper('url');
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
        
    }
	public function index()

	{
	  $this->db->order_by('emp_code', 'desc');
	  $data['client'] = $this->db->get('masemp')->result_array();
      $this->load->view('empalter',$data);	
	}
   
	 public function newemp()
	{
		// $current_date=date("Y-m-d");
        $data['emp_code']='1';	   
	    $data['empname']='';
		$data['username']='';
		$data['password']='';
		$data['contactno']='';
		$data['branch_code']='';
		$data['cashcode']='';
		$data['email']='';
		$data['address']='';
		$data['details']='';
        $data['active']='1';			
		$data['flag']= 'ADD'; 
		$this->load->view('empedit',$data);	
	}
	 public function saveemp()

	{
        $flag= $this->input->post('flag');	
		$empname= $this->input->post('empname');
        $details= $this->input->post('details');
        $branch_code= $this->input->post('branch_code');		
        
		 
        $username= $this->input->post('username');
        $password= $this->input->post('password');
        $contactno= $this->input->post('contactno');
        $address= $this->input->post('address');
        $email= $this->input->post('email');
		$cashcode= $this->input->post('cashcode');
        $active= $this->input->post('active');		
		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$emp_code = 1;			
            $row = $this->db->query('SELECT MAX(emp_code) AS `maxid` FROM `masemp`')->row();
            if ($row)
			   {
				   if ($empname)
				   {
                    $emp_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO masemp ";			
                    $strSQL .="(emp_code,empname) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$emp_code.",'".$empname."') ";	          
			        $this->db->query($strSQL);		  
				   }
				  }             
        }
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$emp_code=$this->uri->segment(3); 		  
            
        }
		  $strSQL ="update masemp set empname='".$empname."',cashcode='".$cashcode."',details='".$details."'	
                     ,username='".$username."',password='".$password."'	,contactno='".$contactno."'
                     ,address='".$address."',
					 email='".$email."',branch_code='".$branch_code."',active='".$active."'							 
			          where emp_code='".$emp_code."'";
	    $this->db->query($strSQL);  
	    $this->index();	
	          
        
		
	}
	public function editemp() {	
	    $emp_code=$this->uri->segment(3); 
	    $this->db->where('emp_code', $emp_code);
		$datauser= $this->db->get('masemp');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['details']= $data['cuser']->details;
	
		$data['emp_code']= $this->uri->segment(3); 
		$data['cashcode']=$data['cuser']->cashcode;
		$data['empname']=$data['cuser']->empname;
		$data['branch_code']= $data['cuser']->branch_code;	
		$data['active']= $data['cuser']->active;	
		
		$data['username']=$data['cuser']->username;
		$data['password']=$data['cuser']->password;
		$data['contactno']=$data['cuser']->contactno;
		$data['contactno']=$data['cuser']->contactno;
		$data['address']=$data['cuser']->address;
		$data['email']=$data['cuser']->email;
		
		$data['flag']= 'EDIT';		
		$this->load->view('empedit',$data);	
        
    }
	
	}