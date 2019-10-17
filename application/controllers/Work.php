<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {
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
	  $this->db->order_by('work_code', 'desc');
	  $data['client'] = $this->db->get('maswork')->result_array();
      $this->load->view('workalter',$data);	
	}   
	 public function newwork()
	{
        $data['work_code']='1';	   
	    $data['workname']='';
		$data['subjobname']='Select';
		$data['ac_name']='Select';
		$data['empname']='Select';
		$data['details']='';	
		$data['duedate']='';	
		$data['flag']= 'ADD'; 
		$this->load->view('workedit',$data);	
	}
	 public function savework()

	{
        $flag= $this->input->post('flag');	
		$workname= $this->input->post('workname');
        $details= $this->input->post('details');	
        $duedate= $this->input->post('datepicker');	
        $duedate = date('Y-m-d', strtotime($duedate));		
		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$subjob_code = 1;			
            $row = $this->db->query('SELECT MAX(work_code) AS `maxid` FROM `maswork`')->row();
            if ($row)
			   {
				   if ($workname)
				   {
                    $work_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO maswork ";			
                    $strSQL .="(work_code,workname) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$work_code.",'".$workname."') ";	          
			        $this->db->query($strSQL);		  
				   }
				  }             
        }
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$work_code=$this->uri->segment(3); 		  
            
        }		
		
		$subjobname= $this->input->post('subjobname');
		$this->db->where('subjobname', $subjobname);	
		
		$datauser= $this->db->get('massubjob');
		
        foreach ($datauser->result() as $data['cmasjob']){};
	    $subjob_code= $data['cmasjob']->subjob_code;	
		
		$empname= $this->input->post('empname');
		$this->db->where('empname', $empname);	     
		$datauser= $this->db->get('masemp');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $emp_code= $data['cmasjob']->emp_code;		
	    
        $ac_name= $this->input->post('acname');
		$this->db->where('ac_name', $ac_name);	     
		$datauser= $this->db->get('accmasaccounts');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $ac_code= $data['cmasjob']->ac_code;
		
      			
		$strSQL ="update maswork set workname='".$workname."',details='".$details."',subjob_code='".$subjob_code."'
                      ,ac_code='".$ac_code."',emp_code='".$emp_code."',duedate='".$duedate."'		
			          where work_code='".$work_code."'";
	        $this->db->query($strSQL);  
	     $this->index();	
	          
        
		
	}
	public function editwork() {	
	    $work_code=$this->uri->segment(3); 
	    $this->db->where('work_code', $work_code);
		$datauser= $this->db->get('maswork');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['details']= $data['cuser']->details;
		 
		$data['work_code']= $this->uri->segment(3); 
		$data['workname']=$data['cuser']->workname;
		
		$subjob_code=$data['cuser']->subjob_code;
		$this->db->where('subjob_code', $subjob_code);	     
		$datauser= $this->db->get('massubjob');	
	    foreach ($datauser->result() as $data['cmassubjob']){};
		$data['subjobname']=$data['cmassubjob']->subjobname;
		
		
		$ac_code=$data['cuser']->ac_code;
		$this->db->where('ac_code', $ac_code);	     
		$datauser= $this->db->get('accmasaccounts');	
	    foreach ($datauser->result() as $data['cmassubjob']){};
		$data['ac_name']=$data['cmassubjob']->ac_name;
		
		$emp_code=$data['cuser']->emp_code;
		$this->db->where('emp_code', $emp_code);	     
		$datauser= $this->db->get('masemp');	
	    foreach ($datauser->result() as $data['cmassubjob']){};
		$data['empname']=$data['cmassubjob']->empname;
		
        $data['duedate']=date("d-m-Y", strtotime($data['cuser']->duedate) );		
		$data['flag']= 'EDIT'; 
		$this->load->view('workedit',$data);	
        
    }
	
	}