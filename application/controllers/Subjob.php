<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjob extends CI_Controller {
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
	  $this->db->order_by('subjob_code', 'desc');
	  $data['client'] = $this->db->get('massubjob')->result_array();
      $this->load->view('subjobalter',$data);	
	}
	
	   function savesubjob1old( )
	  { 
		 	 echo $eduid = $this->input->post('edu');	 
		//$strSQL="UPDATE user set edu_id=$edu_id,work_id=$work_id,post_id=$post_id,dept_id=$dept_id,workplace_id=$place_id ,income_id=$income_id WHERE user_id ='".$user_id."'"; 
      	$strSQL="UPDATE massubjob set subjobname='G.S.T. I' WHERE subjob_code =1"; 
		$result=$this->db->query($strSQL);  if (!$result) {    die(mysql_error());}echo "Sucessfully Updated";
		    //echo $strSQL;	
		   //exit();
		   //echo 'welcome';
		 }	
		 
		 
	public function getsubjob1()
	{
		if( $_REQUEST["yearname"] )
      {
        $yearname=$_REQUEST["yearname"];
        echo $yearname; 
          
	  }	
	}	  
	public function geteduu()
	   {
           $keyword=$_GET["term"];
	       $row_num = 1;
	       $result = mysql_query("SELECT edu_tamil FROM edu where edu_name like '%".$keyword."%'");	
	       $data = array();
           if (!$result) {    die(mysql_error());}
	       while ($row = mysql_fetch_assoc($result)) 
		   {
		        $name = $row['edu_tamil'];
		       array_push($data, $name);	
	    }	
	}
	 public function newsubjob()
	{
        $data['subjob_code']='1';	   
	    $data['subjobname']='';
		$data['jobname']='Select';
		$data['details']='';	
		$data['flag']= 'ADD'; 
		$this->load->view('subjobedit',$data);	
	}
	 public function savesubjob()

	{
        $flag= $this->input->post('flag');	
		$subjobname= $this->input->post('subjobname');
        $details= $this->input->post('details');			
		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$subjob_code = 1;			
            $row = $this->db->query('SELECT MAX(subjob_code) AS `maxid` FROM `massubjob`')->row();
            if ($row)
			   {
				   if ($subjobname)
				   {
                    $subjob_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO massubjob ";			
                    $strSQL .="(subjob_code,subjobname) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$subjob_code.",'".$subjobname."') ";	          
			        $this->db->query($strSQL);		  
				   }
				  }             
        }
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$subjob_code=$this->uri->segment(3); 		  
            
        }		
		
		$jobname= $this->input->post('jobname');
		$this->db->where('jobname', $jobname);	     
		$datauser= $this->db->get('masjob');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $job_code= $data['cmasjob']->job_code;		
	     
      			
		$strSQL ="update massubjob set subjobname='".$subjobname."',details='".$details."',job_code='".$job_code."'			       
			          where subjob_code='".$subjob_code."'";
	        $this->db->query($strSQL);  
	     $this->index();	
	          
        
		
	}
	public function savesubjob1()
	{
		 $strSQL ="UPDATE massubjob1  set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  subjob_codee=".$_POST["subjob_codee"];
		  $this->db->query($strSQL);
	 
		 
	}
   
	public function editsubjob() {	
	    $subjob_code=$this->uri->segment(3); 
	    $this->db->where('subjob_code', $subjob_code);
		$datauser= $this->db->get('massubjob');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['details']= $data['cuser']->details;
		 
		$data['subjob_code']= $this->uri->segment(3); 
		$data['subjobname']=$data['cuser']->subjobname;
		
		$job_code=$data['cuser']->job_code;
		$this->db->where('job_code', $job_code);	     
		$datauser= $this->db->get('masjob');	
	    foreach ($datauser->result() as $data['cmasjob']){};
		$data['jobname']=$data['cmasjob']->jobname;
        		
		$data['flag']= 'EDIT'; 
		
		 
        $this->db->where('massubjob1.subjob_code', $subjob_code);	   		
	    $this->db->select('subjob_codee,yearname,subjobnamee');
        $this->db->from('massubjob1');
		$this->db->join('massubjob', 'massubjob.subjob_code = massubjob1.subjob_code','left');
		$this->db->join('masyear', 'masyear.year_id = massubjob1.year_id','left');		
		//$rsdata= $this->db->get('');//print_r($rsdata);exit();		 
		$dataa['agent']= $this->db->get('')->result_array(); 
		//print_r($dataa['agent']);
		$this->load->view('subjobedit',$data);	
		$this->load->view('subjob1',$dataa);	
        
    }
	
	}