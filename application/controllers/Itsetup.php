<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itsetup extends CI_Controller {
	function __construct()
    {
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
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
	  $this->db->order_by('itr_code', 'desc');
	  $data['client'] = $this->db->get('masitr')->result_array();
      $this->load->view('italter',$data);	
	}
   
	 public function newitr()
	{
		// $current_date=date("Y-m-d");
        $data['itr_code']='1';	   
	    $data['itryear']='';
		$data['itrname']='';
		$data['description']='';	
		$this->load->view('itedit',$data);	
	}
	 public function saveitr()

	{
        $flag= $this->input->post('flag');	
		$itrname= $this->input->post('itrname');
        $itryear= $this->input->post('itryear');
        $description= $this->input->post('description');			
        
        
       
		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$itr_code = 1;			
            $row = $this->db->query('SELECT MAX(itr_code) AS `maxid` FROM `masitr`')->row();
            if ($row)
			   {
				   if ($itrname)
				   {
                    $itr_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO masitr ";			
                    $strSQL .="(itr_code,itrname) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$itr_code.",'".$itrname."') ";	          
			        $this->db->query($strSQL);		  
				   }
				  }             
        }
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$itr_code=$this->uri->segment(3); 		  
            
        }
		  $strSQL ="update masemp set itrname='".$itrname."',itryear='".$itryear."'	
                     ,description='".$description."'					 
			          where itr_code='".$itr_code."'";
	        $this->db->query($strSQL);  
	     $this->index();	
	          
        
		
	}
	public function edititr() {	
	    $itr_code=$this->uri->segment(3); 
	    $this->db->where('itr_code', $itr_code);
		$datauser= $this->db->get('masitr');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['description']= $data['cuser']->description;
	
		$data['itr_code']= $this->uri->segment(3); 
		$data['itrname']=$data['cuser']->itrname;		
		$data['itryear']=$data['cuser']->itryear;		
		
		$data['flag']= 'EDIT'; 
		$this->load->view('itedit',$data);	
        
    }
	
	}