<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
       // $this->output->set_header('Pragma: no-cache');
       // $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
      //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->library('session');	  
        $this->load->helper('url');
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
		date_default_timezone_set('Asia/Kolkata');
        
    }
	public function sortabletaskone()
	{
		$emp_code= $_POST['emp_code'];		
		$data['emp_code']=$emp_code;		
		
		$data['taskstagea']=$this->getsortablea($emp_code);
        $data['taskstageb']=$this->getsortableb($emp_code);	 
        $data['taskstagec']=$this->getsortablec($emp_code);	 
 		$results = array();
		
				
		$current_datetime=date("Y-m-d");		
        $this->db->where('starting_date<=', $current_datetime);			
		$this->db->distinct();
        $this->db->select('entryandverfiorder,task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,
		movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  1);		
        $this->db->where('entryassisgnedto',  $emp_code);	
 		
       // $this->db->order_by('entryandverfiorder');
        	   
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		$results1 =  $this->db->get('trntask2');	
		
		$this->db->where('verificationassignto',  $emp_code);
		$current_datetime=date("Y-m-d");
        $this->db->where('starting_date<=', $current_datetime);	
        $this->db->distinct(); 		
        $this->db->select('entryandverfiorder,task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  2);		   
      //  $this->db->order_by('entryandverfiorder');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		$results2 = $this->db->get('trntask2');	
		
        if ($results1->num_rows()) 
        {
          $results = array_merge($results, $results1->result());
        }

       if ($results2->num_rows())
        {
         $results = array_merge($results, $results2->result());
          }
		  
		   
	  
	    usort($results, function ($a, $b) { return strnatcmp($a->entryandverfiorder, $b->entryandverfiorder); });
        $data['results']=$results;	 
		 
		$this->load->view('sortabletaskone',$data);
		 	
		 
	}
	 public function sortabletask()
	{
		$data['emp_code']=0;
		$data['taskstagea']='';
        $data['taskstageb']='';
        $data['taskstagec']=''; 
        $data['results']='';	 		
		$this->load->view('sortabletask',$data);
		
	}
		public function movetotask2()

	{
        $id=$_POST["id"];$action=$_POST["action"];
		 //0.Un Processed 1.Defective 3.Form16 4.Processed
		if($action=="tdsform16")
		{
            $strSQL ="update trntask2 set verified=3  where id='".$id."'";
			$this->db->query($strSQL);  
		}
		elseif($action=="tdsprocessed")
		{
            $strSQL ="update trntask2 set verified=4  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
	    elseif($action=="tdsdefective")
		{
            $strSQL ="update trntask2 set verified=1  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
	    
	}
	public function index()
	{
		 
		$this->load->view('login');
		
	}

	    public function processedtds()
	{
		 
		$branch_code=$this->session->userdata('branchcode');
		
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branch_code);	
		}
		
		//$this->db->where('group_code', $branch_code);
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',6);
        $this->db->where('verified',4);				
		$this->db->distinct();	
	     $this->db->where('massubjob.tds',0);	
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,accmasaccounts.ac_code,itreturndate,remarks,
		remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('tdsprocessed',$data);
        
	}
    public function form16tds()
	{
		//$task_code= $this->uri->segment(3); 
		$branch_code=$this->session->userdata('branchcode');
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branch_code);	
		}
		
		
		$this->db->where('massubjob.tds',0);	
		//$this->db->where('group_code', $branch_code);
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',6);
        $this->db->where('verified',3);	
        $this->db->where('massubjob.tds',0);			
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,accmasaccounts.ac_code,itreturndate,remarks,
		remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('form16tds',$data);
        
	}
    public function unprocessedtds()
	{
		//$task_code= $this->uri->segment(3); 
		  $branch_code=$this->session->userdata('branchcode');
		
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		 $admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('accmasaccounts.group_code', $branch_code);	
		}
				
		
		$current_datetime=date("Y-m-d");
		//$this->db->where('billed', 0);
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',6);
        $this->db->where('verified',0);	
        $this->db->where('massubjob.tds',0);			
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,accmasaccounts.ac_code,itreturndate,remarks,
		remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('unprocessedtds',$data);
        
	}
	  public function defectivetds()
	{
		//$task_code= $this->uri->segment(3); 
		$branch_code=$this->session->userdata('branchcode');
		
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branch_code);	
		}
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',6);
        $this->db->where('verified',1);	
         $this->db->where('massubjob.tds',0);			
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,accmasaccounts.ac_code,itreturndate,remarks,
		remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('defectivetds',$data);
        
	}
    public function saveremarks()

	{
        $id=$_POST["id"];
		$column=$_POST["column"];	
        $strSQL ="update trntask2 set $column='".$_POST["editval"]."'    where id='".$id."'";	
	    $this->db->query($strSQL);      
	}
	public function savedate()

	{
        $id=$_POST["id"];		
		  $itree=$_POST["editval"];   
         $sec = strtotime($itree);		  
           $itree=date("Y-m-d",$sec);   
		//$itreturndate = substr($itree, 6, 4).'-'.substr($itree,3, 2).'-'.substr($itree,0, 2);	
		
         $strSQL ="update trntask2 set itreturndate='".$itree."'    where id='".$id."'";	
	    $this->db->query($strSQL);      
	}
    	public function movetotask1()

	{
        $id=$_POST["id"];$action=$_POST["action"];
		 
		if($action=="itverified")
		{
            $strSQL ="update trntask2 set verified=2  where id='".$id."'";
			$this->db->query($strSQL);  
		}
		elseif($action=="itprocessed")
		{
            $strSQL ="update trntask2 set verified=4  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
	    elseif($action=="itdefective")
		{
            $strSQL ="update trntask2 set verified=3  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
	    
	}
	
	public function linkit()
	{
		 
		$branch_code=$this->session->userdata('branchcode');
		 
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			 $this->db->where('group_code', $branch_code);	
		}
		 
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',3);
		$this->db->where('verified>=',0);	
        $this->db->where('verified<=',1);				
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,pan,accmasaccounts.ac_code,itreturndate,remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('showittask',$data);
        
	}
	
	public function defectiveit()
	{
		 
		$branch_code=$this->session->userdata('branchcode');
		 
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branch_code);	
		}
		 
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',3);
        $this->db->where('verified',3);				
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,accmasaccounts.ac_code,itreturndate,remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('defectiveit',$data);
        
	}
	public function processedit()
	{
		$branch_code=$this->session->userdata('branchcode');
		 
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branch_code);	
		}
		
		
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',3);
        $this->db->where('verified',4);				
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,accmasaccounts.ac_code,itreturndate,remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('processedit',$data);
        
	}
	public function verifieditr()
	{
		$branch_code=$this->session->userdata('branchcode');
		 
		$data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
              $data['followupp'] = $_POST['followupp'];
			 if ($data['followupp']==0)
			 {
				
			  }
			  else
			  {
				 $this->db->where('massubjob.subjob_code', $_POST['followupp']); 
			  }
			 
        }
		else
		{
			
		}
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branch_code);	
		}
		
		 
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 4);
        $this->db->where('job_code',3);
        $this->db->where('verified',2);				
		$this->db->distinct();	
	  
		
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,pan,accmasaccounts.ac_code,itreturndate,remarks4,verificationdoneby,masverificationdone.username as verificationdone,
		ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
		$this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['client'] = $this->db->get('massubjob')->result_array();
		$this->load->view('verifieditr',$data);
        
	}
    public function sortable()
	{
		$data['emp_code']=0;
		$data['taskstagea']='';
        $data['taskstageb']='';
        $data['taskstagec']=''; 
        $data['results']='';	 		
		$this->load->view('sortable',$data);
		
	}
	
	public function getsortablea($emp_code)
	{
		
		$this->db->distinct();
		
		//$branch_code=$this->session->userdata('branchcode');
		$current_datetime=date("Y-m-d");
        $this->db->where('starting_date<=', $current_datetime);	
        $this->db->select('followupassigntoorder,task_name,trntask1.task_code '); 
        $this->db->where('movetotask', 0);		   
        $this->db->order_by('followupassigntoorder,trntask1.task_code');
        $this->db->where('followupassignto',  $emp_code);
		$this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code');
		return $taskstagea = $this->db->get('trntask1');	
		   
		   
	}
	public function getsortableb($emp_code)
	{	
	    //$branch_code=$this->session->userdata('branchcode');
       // $this->db->where('group_code', $branch_code);		//based on accmasaccounts not on masemp
        $this->db->where('entryassisgnedto',  $emp_code);
		//$this->db->or_where('verificationassignto',  $emp_code);
		$current_datetime=date("Y-m-d");
		//$this->db->or_where_in('movetotask', array('1','2'));
        $this->db->where('starting_date<=', $current_datetime);	
		
		$this->db->distinct();
        $this->db->select('entryassignorder,task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,
		movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  1);	
      //  $this->db->where('movetotask<=',  2);				
        $this->db->order_by('entryassignorder,subjobname,trntask1.task_code');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		return $taskstageb = $this->db->get('trntask2');	
		   
	}
	public function getsortablecd($emp_code)
	{      
        //$branch_code=$this->session->userdata('branchcode');    
	    //$this->db->where('group_code', $branch_code);//based on accmasaccounts not on masemp
		$this->db->where('verificationassignto',  $emp_code);
		$current_datetime=date("Y-m-d");
        $this->db->where('starting_date<=', $current_datetime);		
        
        $this->db->distinct(); 		
        $this->db->select('task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  2);		   
        $this->db->order_by('verificationassignorder,subjobname,trntask1.task_code');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		return $getsortablecd = $this->db->get('trntask2');	
		
	}
	public function getsortablebd($emp_code)
	{	
	    //$branch_code=$this->session->userdata('branchcode');
       // $this->db->where('group_code', $branch_code);		//based on accmasaccounts not on masemp
        $this->db->where('entryassisgnedto',  $emp_code);
		//$this->db->or_where('verificationassignto',  $emp_code);
		$current_datetime=date("Y-m-d");
		//$this->db->or_where_in('movetotask', array('1','2'));
        $this->db->where('starting_date<=', $current_datetime);	
		
		$this->db->distinct();
        $this->db->select('task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,
		movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  1);	
      //  $this->db->where('movetotask<=',  2);				
        $this->db->order_by('entryassignorder,subjobname,trntask1.task_code');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		return $getsortablebd = $this->db->get('trntask2');	
		   
	}
	public function getsortablec($emp_code)
	{      
        //$branch_code=$this->session->userdata('branchcode');    
	    //$this->db->where('group_code', $branch_code);//based on accmasaccounts not on masemp
		$this->db->where('verificationassignto',  $emp_code);
		$current_datetime=date("Y-m-d");
        $this->db->where('starting_date<=', $current_datetime);		
        
        $this->db->distinct(); 		
		$this->db->select('task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,movetotask,
		entryassisgnedto,verificationassignto,verificationassignorder'); 
        $this->db->where('movetotask',  2);		   
        $this->db->order_by('verificationassignorder,subjobname,trntask1.task_code');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		return $taskstagec = $this->db->get('trntask2');	
		
	}
	public function sortableone()
	{
		$emp_code= $_POST['emp_code'];		
		$data['emp_code']=$emp_code;		
		
		$data['taskstagea']=$this->getsortablea($emp_code);
        $data['taskstageb']=$this->getsortableb($emp_code);	 
        $data['taskstagec']=$this->getsortablec($emp_code);	 
 		$results = array();
		
				
		$current_datetime=date("Y-m-d");		
        $this->db->where('starting_date<=', $current_datetime);			
		$this->db->distinct();
        $this->db->select('entryandverfiorder,task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,
		movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  1);		
        $this->db->where('entryassisgnedto',  $emp_code);	
 		
       // $this->db->order_by('entryandverfiorder');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		$results1 =  $this->db->get('trntask2');	
		
		$this->db->where('verificationassignto',  $emp_code);
		$current_datetime=date("Y-m-d");
        $this->db->where('starting_date<=', $current_datetime);	
        $this->db->distinct(); 		
        $this->db->select('entryandverfiorder,task_name ,subjobname,ac_name,trntask1.task_code,id,remarks,movetotask,entryassisgnedto,verificationassignto'); 
        $this->db->where('movetotask',  2);		   
      //  $this->db->order_by('entryandverfiorder');           
		$this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');			
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
		$results2 = $this->db->get('trntask2');	
		
        if ($results1->num_rows()) 
        {
          $results = array_merge($results, $results1->result());
        }

       if ($results2->num_rows())
        {
         $results = array_merge($results, $results2->result());
          }
		  
		   
	  
	    usort($results, function ($a, $b) { return strnatcmp($a->entryandverfiorder, $b->entryandverfiorder); });
        $data['results']=$results;	 
		 
		$this->load->view('sortableone',$data);
		 	
		 
	}
	
	 
	public function sortablethreec()
	{
		$strSQL='';	
		if(isset($_POST["row_orderc"]))
		{
			
			$id_ary = $_POST["row_orderc"];
            for($i=0;$i<count($id_ary);$i++)
				{
                    $strSQL="UPDATE trntask2 SET verificationassignorder='" . $i . "' WHERE id=". $id_ary[$i];	
                    $this->db->query($strSQL); 					
				}
				
        } 
        echo 'Completed';		
    }
	public function sortablethreed()
	{
		$strSQL='';	
		if(isset($_POST["row_orderd"]))
		{
			
			$id_ary = $_POST["row_orderd"];
            for($i=0;$i<count($id_ary);$i++)
				{
                    $strSQL="UPDATE trntask2 SET entryandverfiorder='" . $i . "' WHERE id=". $id_ary[$i];	
                    $this->db->query($strSQL); 					
				}
				
        } 
        echo 'Completed';		
    }
	public function sortablethreeb()
	{
		$strSQL='';	
		
		if(isset($_POST["row_orderb"]))
		{
			
			$id_ary = $_POST["row_orderb"];
            for($i=0;$i<count($id_ary);$i++)
				{
                     $strSQL="UPDATE trntask2 SET entryassignorder='" . $i . "' WHERE id=". $id_ary[$i];
                    $this->db->query($strSQL); 					
				}
				
        } 
        echo 'Completed';		
    }
	public function sortablethreea()
	{
		$strSQL='';	
		if(isset($_POST["row_ordera"]))
		{
			
			$id_ary = $_POST["row_ordera"];
            for($i=0;$i<count($id_ary);$i++)
				{
                    $strSQL="UPDATE trntask2 SET followupassigntoorder='" . $i . "' WHERE task_code=". $id_ary[$i];
                    $this->db->query($strSQL); 					
				}
				
        } 
        echo 'Completed';		
    }
	
	public function sortablethree()
	{
		$strSQL='';
		if(isset($_POST["submit"]))
			{
				$emp_code= $_POST['emp_code'];		
		        $data['emp_code']=$emp_code;
				$stage= $_POST['stage'];
		        $data['stage']=$stage;
				
              $id_ary = explode(",",$_POST["row_order"]);
               for($i=0;$i<count($id_ary);$i++)
				   {
					  
     					 
                        if ($stage==0)
		                {						
                           $strSQL="UPDATE trntask2 SET followupassigntoorder='" . $i . "' WHERE task_code=". $id_ary[$i];
					   
					    }
						else if ($stage==1)
		                {						
                           $strSQL="UPDATE trntask2 SET entryassignorder='" . $i . "' WHERE id=". $id_ary[$i];
						   
					   
					    }
						else if ($stage==2)
		                {						
                           $strSQL="UPDATE trntask2 SET verificationassignorder='" . $i . "' WHERE id=". $id_ary[$i];
					   
					    }
					$this->db->query($strSQL); 
                   }
				   
		 
		    
		

		
		 $this->load->view('sortableone',$data);
			    	
             }
		
	
	}
	public function followupasign()
	{
		$names = array(7,8);
        $this->db->where_in('group_code', $names);	
		$this->db->order_by('group_code');
        $this->db->select('groupname,group_code');  
		$data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();		 
		$this->load->view('followupasign',$data);		
	}
	public function followupasignone()
	{
		$task_code= $_POST['task_code'];
		$branch_code= $_POST['branch_code'];
        $current_datetime=date("Y-m-d"); 	
		
		$this->db->where('active',1);			
		$this->db->where('branch_code', $branch_code);		
		$this->db->order_by('emp_code');		
        $this->db->select('empname,emp_code');  
		$data['masemp'] = $this->db->get('masemp')->result_array();
		$data['branch_code'] = $branch_code; 
		if ($task_code==7)
		{
		  $this->db->where('group_code', $branch_code);
	      $this->db->where('movetotask', 0);
		  $this->db->where('followupassignto', 0);
		
          $this->db->distinct();	
          $this->db->where('starting_date<=', $current_datetime);	
	      $this->db->order_by('subjobname,trntask1.task_code');   
	      $this->db->select('starting_date,subjobname,task_name,trntask1.task_code');
	      $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
          $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
          $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
          $data['followupasignone'] = $this->db->get('massubjob')->result_array(); 
		  
		  $names = array(7,8);
          $this->db->where_in('group_code', $names);	
		  $this->db->order_by('group_code');
          $this->db->select('groupname,group_code');  
		  $data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();	
		  $this->load->view('followupasignone',$data);
		}
		else if ($task_code==8)
		{
		  $this->db->where('group_code', $branch_code);
	      $this->db->where('movetotask', 1);
		  $this->db->where('entryassisgnedto', 0);
		
          $this->db->distinct();	
          $this->db->where('starting_date<=', $current_datetime);	
	      $this->db->order_by('subjobname,trntask1.task_code');   
	      $this->db->select('id,ac_name,starting_date,subjobname,task_name,trntask1.task_code');
	      $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
          $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
          $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
          $data['followupasignone'] = $this->db->get('massubjob')->result_array();
		  
		  $this->db->order_by('group_code');
          $this->db->select('groupname,group_code');  
	 	  $data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();	
		  $this->load->view('followupasigntwo',$data);
		}
		else if ($task_code==9)
		{
		  $this->db->where('group_code', $branch_code);
	      $this->db->where('movetotask', 2);
		  $this->db->where('verificationassignto', 0);
		 
          $this->db->distinct();	
          $this->db->where('starting_date<=', $current_datetime);	
	      $this->db->order_by('subjobname,trntask1.task_code');   
	      $this->db->select('id,ac_name,starting_date,subjobname,task_name,trntask1.task_code');
	      $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
          $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
          $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
          $data['followupasignone'] = $this->db->get('massubjob')->result_array();
		 
		 $this->db->order_by('group_code');
          $this->db->select('groupname,group_code');  
		  $data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();	
		  $this->load->view('followupasignthree',$data);
		}
		
		
		
	}
	public function showdetail()
	{
		$task_code= $this->uri->segment(3); 
		$branch_code=$this->uri->segment(4); 
		
		$this->db->where('group_code', $branch_code);
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 0);
		$this->db->where('trntask1.task_code', $task_code);
		
		//$this->db->where('followupassignto', 0);
		
		$this->db->distinct();	
        $this->db->where('starting_date<=', $current_datetime);	
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,followupassignto,ac_name,group_code,ending_date,starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
        $data['showdetail'] = $this->db->get('massubjob')->result_array();
		$this->load->view('showdetail',$data);
        
	}
	public function savefollowupasign()
	{
		$task_code= $_POST['task_code'];
        $branch_code= $_POST['branch_code'];	 		
        $followupassignto= $_POST['emp_code']; 
        foreach($task_code as $task_value)
        { 
		    $strSQL  = "UPDATE trntask2 AS tt JOIN accmasaccounts AS acc ON tt.ac_code = acc.ac_code
			SET followupassignto= $followupassignto 
			WHERE acc.group_code = $branch_code and tt.task_code = $task_value";
 //UPDATE trntask2 AS tt JOIN accmasaccounts AS acc ON tt.ac_code = acc.ac_code SET followupassignto= 3 WHERE acc.group_code = 7 //and tt.task_code = 89
			 //$strSQL = "update trntask2 set followupassignto=".$followupassignto."  where task_code=".$task_value."";
			 $this->db->query($strSQL);	
			 
        } 	 	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';
      //  $this->load->view("admin/followupasign");
	    $this->db->order_by('group_code');
        $this->db->select('groupname,group_code');  
		$data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();
		 
		$this->load->view('followupasign',$data);
	}
	
	public function savefollowupasigntwo()
	{
		$id= $_POST['task_code'];	
        $followupassignto= $_POST['emp_code']; 
        foreach($id as $task_value)
        { 
			 $strSQL = "update trntask2 set entryassisgnedto=".$followupassignto."  where id=".$task_value."";
			 $this->db->query($strSQL);	
			 
        } 	 	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';      
	    $this->db->order_by('group_code');
        $this->db->select('groupname,group_code');  
		$data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();
		 
		$this->load->view('followupasign',$data);
	}
	
	public function savefollowupasignthree()
	{
		$id= $_POST['task_code'];	
        $followupassignto= $_POST['emp_code']; 
        foreach($id as $task_value)
        { 
			 $strSQL = "update trntask2 set verificationassignto=".$followupassignto."  where id=".$task_value."";
			 $this->db->query($strSQL);	
			 
        } 	 	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';      
	    $this->db->order_by('group_code');
        $this->db->select('groupname,group_code');  
		$data['accmasgroup'] = $this->db->get('accmasgroup')->result_array();
		 
		$this->load->view('followupasign',$data);
	}
	
	
	public function main() {

	    
		$branch_code=$this->session->userdata('branchcode');		
		$emp_code = $this->session->userdata('emp_code');
		$admin = $this->session->userdata('admin');
	     
		if($admin==1)
		{
			
		}
        else if($admin==0)
		 
        {			
		    
		   $this->db->where('group_code', $branch_code);
   		}
		 
		$current_datetime=date("Y-m-d");
	 
		$this->db->where('tds', 0);//only not fit for followp + entry + verifcation register
		//$this->db->where('job_code !=',5); 		
		$this->db->where('movetotask', 0);
		$this->db->where('followupassignto', $emp_code);		
		$this->db->distinct();	
        $this->db->where('starting_date<=', $current_datetime);	
		$this->db->order_by('subjobname,trntask1.task_code,followupassignto');	        
	    $this->db->select('massubjob.job_code,empname,followupassignto,ending_date,
		starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
        		
        $data['showdetail'] = $this->db->get('massubjob')->result_array();
		
		$strSQL =  "delete from tmpdaysbreakup where empcode=$emp_code";
		$this->db->query($strSQL);
		
        $strSQL =  "INSERT INTO tmpdaysbreakup(empcode,orderbydate,typee,prevempname,id,dayss,followupdoneat,entrydoneat,entryandverfiorder,
			entryassignorder,verificationassignorder,movetotask,ac_code,ac_name,job_code,currentempname,verificationassignto,ending_date,
			starting_date,subjobname,task_name,task_code) 
			select  masemp.emp_code,
			concat(MID(followupdoneat, 7, 4),'-', MID(followupdoneat, 4, 2),'-',MID(followupdoneat, 1,2)),
			'Entry Level' as typee,masprev.empname as prevempname,id,datediff(entrydoneat, followupdoneat) as dayss,
			 followupdoneat,entrydoneat,entryandverfiorder,entryassignorder,verificationassignorder,
			 movetotask,accmasaccounts.ac_code,ac_name,massubjob.job_code,masemp.empname as currentempname,entryassisgnedto,ending_date,
			starting_date,subjobname,task_name,trntask1.task_code from (((((massubjob
			left outer join trntask1 on trntask1.subjob_code = massubjob.subjob_code)
			left outer join trntask2 on trntask2.task_code = trntask1.task_code)
			left outer join accmasaccounts on accmasaccounts.ac_code = trntask2.ac_code)
			left outer join masemp masprev on masprev.emp_code = trntask2.followupassignto)
			left outer join masemp on masemp.emp_code = trntask2.entryassisgnedto)
			where entryassisgnedto=".$emp_code."   and  movetotask=1 order by followupdoneat ";
		$this->db->query($strSQL);
		
        $strSQL =  "INSERT INTO tmpdaysbreakup(empcode,orderbydate,typee,prevempname,id,dayss,followupdoneat,entrydoneat,entryandverfiorder,
			entryassignorder,verificationassignorder,movetotask,ac_code,ac_name,job_code,currentempname,verificationassignto,ending_date,
			starting_date,subjobname,task_name,task_code) 
			select   masemp.emp_code,concat(MID(entrydoneat, 7, 4),'-', MID(entrydoneat, 4, 2),'-',MID(entrydoneat, 1,2)),'Verification Level' as typee,masprev.empname as prevempname,id,datediff(entrydoneat, followupdoneat) as dayss,
			followupdoneat,entrydoneat,entryandverfiorder,entryassignorder,verificationassignorder,
				   movetotask,accmasaccounts.ac_code,ac_name,massubjob.job_code,masemp.empname as currentempname,verificationassignto,ending_date,
			starting_date,subjobname,task_name,trntask1.task_code from (((((massubjob
			left outer join trntask1 on trntask1.subjob_code = massubjob.subjob_code)
			left outer join trntask2 on trntask2.task_code = trntask1.task_code)
			left outer join accmasaccounts on accmasaccounts.ac_code = trntask2.ac_code)
			left outer join masemp masprev on masprev.emp_code = trntask2.entryassisgnedto)
			left outer join masemp on masemp.emp_code = trntask2.verificationassignto)
			where verificationassignto=".$emp_code."   and  movetotask=2 order by entrydoneat ";
		$this->db->query($strSQL);
        
		$this->db->order_by('orderbydate');
		$this->db->where('empcode', $emp_code);	
        $this->db->select('empcode,typee,prevempname,id,dayss,followupdoneat,entrydoneat,entryandverfiorder,
			entryassignorder,verificationassignorder,movetotask,ac_code,ac_name,job_code,currentempname,verificationassignto,ending_date,
			starting_date,subjobname,task_name,task_code');
		$results =  $this->db->get('tmpdaysbreakup')->result_array();
	//	echo $results->num_rows();
		//$current_datetime=date("Y-m-d");
		//$this->db->where('movetotask', 1);
		//$this->db->where('entryassisgnedto', $emp_code);		
		//$this->db->distinct();	
        //$this->db->where('starting_date<=', $current_datetime);
        //$this->db->order_by('followupdoneat');
	    //$this->db->select('
		//masprev.empname as prevempname,id,datediff(entrydoneat, followupdoneat) as dayss,
		// followupdoneat,entrydoneat,entryandverfiorder,entryassignorder,verificationassignorder,
		// movetotask,accmasaccounts.ac_code,ac_name,massubjob.job_code,masemp.empname as currentempname,entryassisgnedto,ending_date,
		//starting_date,subjobname,task_name,trntask1.task_code');
	    //$this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        //$this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        //$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
		//$this->db->join('masemp masprev', 'masprev.emp_code = trntask2.followupassignto','left');
		//$this->db->join('masemp', 'masemp.emp_code = trntask2.entryassisgnedto','left');
		//$results1 =  $this->db->get('massubjob');
		 
		
		
		//$current_datetime=date("Y-m-d");
		//$this->db->where('movetotask', 2);        				
		//$this->db->where('verificationassignto', $emp_code);		
		//$this->db->distinct();	
        //$this->db->where('starting_date<=', $current_datetime);
	    // $this->db->order_by('entrydoneat');	
		//SELECT STR_TO_DATE(concat(mid(entrydoneat,7,4),"-",mid(entrydoneat,4,2),"-",LEFT(entrydoneat,2)), '%Y/%m/%d') AS days FROM trntask2 where id=1754
	   // $this->db->select('
		//masprev.empname as prevempname,id,datediff(entrydoneat, followupdoneat) as dayss,
		//followupdoneat,entrydoneat,entryandverfiorder,entryassignorder,verificationassignorder,
		//       movetotask,accmasaccounts.ac_code,ac_name,massubjob.job_code,masemp.empname as currentempname,verificationassignto,ending_date,
		//starting_date,subjobname,task_name,trntask1.task_code');
	    //$this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        //$this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        //$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');
        //$this->db->join('masemp masprev', 'masprev.emp_code = trntask2.entryassisgnedto','left');		
		//$this->db->join('masemp', 'masemp.emp_code = trntask2.verificationassignto','left');
        //$results2 =  $this->db->get('massubjob');		
        
	   
		
		//$results = array();
      //  if ($results1->num_rows()) 
       // {
        //  $results = array_merge($results, $results1->result());
        //}

       //if ($results2->num_rows())
        //{
        //   $results = array_merge($results, $results2->result());
       // }
	  
	   // usort($results, function ($a, $b) { return strnatcmp($a->days, $b->days); });
        $data['showdetailtwo']=$results;	
		//$data['showdetailthree']='';		
	
		$this->db->where('group_code', $branch_code);
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 1);
        $this->db->where('job_code !=',5); 				
		$this->db->where('entryassisgnedto',0);			
		$this->db->distinct();	
        $this->db->where('starting_date<=', $current_datetime);	
	    $this->db->order_by('subjobname,trntask1.task_code');   
	    $this->db->select('id,followupdoneat,entrydoneat,id,accmasaccounts.ac_code,ac_name,massubjob.job_code,
		 masprev.empname as prevempname,entryassisgnedto,ending_date,
		starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');			
         $this->db->join('masemp masprev', 'masprev.emp_code = trntask2.followupassignto','left');		 		
        $data['showdetailtwoa'] = $this->db->get('massubjob')->result_array();	
		$this->load->view('admin',$data);	
    }
	
	 public function adm($data)
    {
        $this->db->set('Is_Active',0);
        $this->db->insert('main_menu',$data);
        $this->session->set_flashdata('msg', 'Meun has been added');
        redirect('MainSystem/menu');
    }

	
	 public  function get_menu()
    {

       
        $query=$this->db->get_where('main_menu',array('Is_Active'=>1));
        return $query->result();

    }
	
	   function get_submenu()
    {
        $this->db->where('main_menu.Menu_Name = sub_menu.Main_Menu_Name');
        $this->db->select('*');
        $this->db->from('sub_menu');
        $this->db->join('main_menu', 'main_menu.Menu_Name = sub_menu.Main_Menu_Name','inner');
        $query = $this->db->get();
        return $query->result();


    }
     public function adsm($data)
    {
        $this->db->set('Is_Active',1);
        $this->db->insert('sub_menu',$data);
        $this->session->set_flashdata('msg', 'Meun has been added');
        redirect('MainSystem/menu');
    }

	
	  function menu()
    {
        $this->data['menus'] = $this->ms->get_menu();
        $this->data['submenus'] = $this->ms->get_submenu();
        $this->load->view('index', $this->data);
    }

    function add_menu()
    {
        $data = array(
            'Menu_Name' => $this->input->post('mname'),
            'Menu_Link' => $this->input->post('mlink'),

        );
        $this->ms->adm($data);
    }

    function sub_menu()
    {
        $this->data['mmenu'] = $this->ms->get_menu();
        $this->load->view('submenu', $this->data);
    }


    function add_submenu()
    {
    //    $data = array(
       //     'Main_Menu_Name' => $this->input->post('mmname'),
     //       'Sub_Menu_Name' => $this->input->post('mname'),
      //      'Sub_Menu_Link' => $this->input->post('mlink'),

      //  );
      //  $this->ms->adsm($data);
		
		
		$menu = array(
    'menu_name_1' => array(
        'submenu1_1' => 'www.something.com',
        'submenu1_2' => 'www.something.com',
    ),
    'menu_name_2' => array(
        'submenu2_1' => 'www.something.com',
        'submenu2_2' => 'www.something.com',
    )
);

//foreach($menu as $menu_name => $submenu){
    //echo $menu_name.'<br>';
   // if (!empty($submenu)){
       // foreach($submenu as $submenu_name => $submenu_link){
        //    echo '<a href="'.$submenu_link.'">'.$submenu_name.'</a><br>';
       // }
    //}
//
    }

	 
	public function company() {	
	    $comp_id=$this->uri->segment(3); 		
	    $this->db->where('comp_id', $comp_id);
		$datauser= $this->db->get('msacompany');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['companyname']= $data['cuser']->company_name;
		$data['address1']= $data['cuser']->address1;
		$data['email']= $data['cuser']->email;
		$data['contactnos']= $data['cuser']->contactnos;
		$data['comp_id']= $this->uri->segment(3); 
		$this->load->view('company',$data);	
        
    }
	function strip_carriage_returns($string)
     {
        return str_replace(array("\n\r", "\n", "\r"), '', $string);
     }
	 public function viewstaff() {	
	   //echo  $branchcode =$this->uri->segment(3); 
	//	$this->db->where('accmasaccounts.group_code', $branchcode);	
		//$this->db->where('movetotask', 3);
		
        if (isset($_POST['stage']))
		{
           
             $stage=$_POST["stage"];	
			$task=$_POST["task"];			 
			$emp=$_POST["emp"];
			
			$data['task'] =$task;
			$data['stage']= $stage;
			$data['emp']= $emp;
			
			 
			$current_datetime=date("Y-m-d");
            $this->db->where('starting_date<=', $current_datetime);	
			 
			if ($stage==0)
				{
					$this->db->where('followupassignto', $emp);
				}
				
			if ($stage==1)
				{
					$this->db->where('entryassisgnedto', $emp);
				}
			if ($stage==2)
				{
					$this->db->where('verificationassignto', $emp);
				}	 
			if ($stage==3)
				{
					$this->db->where('finalstagedoneby', $emp);
				}
		    if ($task>-1)  
		    {
		    	$this->db->where('trntask2.task_code', $task);
		    }
		
		    if ($stage>-1)				 
		    {
				$this->db->where('movetotask', $stage);
				
									
				
		    }	
              
        }
		 	
		else
		{
			    $this->db->where('trntask2.task_code', 0);
			 	$this->db->where('movetotask', 1);	 
				$data['task'] =0;
				$data['stage'] =-1;				 
				$data['emp'] =0;
			
				
                	
		}
        		
	    $this->db->order_by('trntask2.task_code,ac_name,trntask2.ac_code'); 
		
	    $this->db->select('task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,entrydoneat,accmasaccounts.contactno,remarks,remarks1,remarks2,remarks3,id,
		followupdoneby,masfollowup.username as followupby,
		followupassignto,masfollowupassign.username as followupassingnto,
		entrydoneby,masentrydone.username as entrydone,
		verificationdoneby,masverificationdone.username as verificationdone,
		verificationassignto,masverificationassign.username as verificationassign,
		finalstagedoneby,masfinalstagedone.username as finalstagedone,		
		accmasaccounts.group_code,movetotask,stage_name');	
		
	    $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code'); 
		$this->db->join('masstage', 'masstage.stage_code = trntask2.movetotask','left'); 
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp masfollowup', 'masfollowup.emp_code = trntask2.followupdoneby','left');
		$this->db->join('masemp masfollowupassign', 'masfollowupassign.emp_code = trntask2.followupassignto','left');
        $this->db->join('masemp masentrydone', 'masentrydone.emp_code = trntask2.entryassisgnedto','left'); 
		$this->db->join('masemp masverificationassign', 'masverificationassign.emp_code = trntask2.verificationassignto','left');
        $this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('masemp masfinalstagedone', 'masfinalstagedone.emp_code = trntask2.finalstagedoneby','left');  		
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('viewstaff',$data);	
        
		//followupdoneby,entrydoneby,verificationdoneby,finalstagedoneby
		//entrylevelreverseby,verificationlevelreverseby,finalstagereverseby
		
    }	
	public function viewall() {	
	   //echo  $branchcode =$this->uri->segment(3); 
	//	$this->db->where('accmasaccounts.group_code', $branchcode);	
		//$this->db->where('movetotask', 3);
		$data['accgroup'] =-100;
        $data['stage'] =-100;	 				
		$data['task'] =-100;
		$data['vehicle'] =1; 
        if (isset($_POST['stage']))
		{
            $vehicle=0;		
            $stage=$_POST["stage"];	
			$task=$_POST["task"];			 
			$accgroup=$_POST["accgroup"];
			$gender=$_POST["gender"];
			
			if (isset($_POST['accgroup']))
			{
			   $vehicle=$_POST["vehicle"];
			}
			$data['task'] =$task;
			$data['stage']= $stage;
			$data['accgroup']= $accgroup;
			$data['vehicle']= $vehicle;
			$data['gender']= $gender;
			 
            // Link ITR  Defective IT  Processed IT   Verified IT
       
           if ($gender==1)  
		    {
		    	$this->db->where('verified>=',0);	
                $this->db->where('verified<=',1);	
				 
			}
            
            if ($gender==2)  
		    {
		    	$this->db->where('verified',3);			
				 
			}
			if ($gender==3)  
		    {
		    	$this->db->where('verified',4);		
				 
			}
			if ($gender==4)  
		    {
		    	$this->db->where('verified',2);		
				 
			}

			$current_datetime=date("Y-m-d");
            $this->db->where('starting_date<=', $current_datetime);	
			if ($vehicle==1)  
		    {
				$this->db->where('entryassisgnedto', 0);
			}
			
			if ($accgroup>-1)  
		    {
					$this->db->where('accmasaccounts.group_code', $accgroup);
			}
			
		    if ($task>-1)  
		    {
		    	$this->db->where('trntask2.task_code', $task);
		    }
		    
		    if ($stage>-1)				 
		    {
				$this->db->where('movetotask', $stage);
		    }	
              
        }
		 	
		else
		{
			  //  $this->db->where('trntask2.task_code', 0);
			 	//$this->db->where('movetotask', 1);
                $data['accgroup'] =-100;
                $data['stage'] =-100;	 				
				$data['task'] =-100;
				$data['vehicle'] =1; 
		}
         $this->load->view('viewall',$data);			
	   
        
		//followupdoneby,entrydoneby,verificationdoneby,finalstagedoneby
		//entrylevelreverseby,verificationlevelreverseby,finalstagereverseby
		
	}	
	public function viewalltest() {	
		 
		 $data['accgroup'] =-100;
		 $data['stage'] =-100;	 				
		 $data['task'] =-100;
		 $data['vehicle'] =1; 
		 if (isset($_POST['stage']))
		 {
			 $vehicle=0;		
			 $stage=$_POST["stage"];	
			 $task=$_POST["task"];			 
			 $accgroup=$_POST["accgroup"];
			 $gender=$_POST["gender"];
			 
			 if (isset($_POST['accgroup']))
			 {
				$vehicle=$_POST["vehicle"];
			 }
			 $data['task'] =$task;
			 $data['stage']= $stage;
			 $data['accgroup']= $accgroup;
			 $data['vehicle']= $vehicle;
			 $data['gender']= $gender;
			  
			 // Link ITR  Defective IT  Processed IT   Verified IT
		
			if ($gender==1)  
			 {
				 $this->db->where('verified>=',0);	
				 $this->db->where('verified<=',1);	
				  
			 }
			 
			 if ($gender==2)  
			 {
				 $this->db->where('verified',3);			
				  
			 }
			 if ($gender==3)  
			 {
				 $this->db->where('verified',4);		
				  
			 }
			 if ($gender==4)  
			 {
				 $this->db->where('verified',2);		
				  
			 }
 
			 $current_datetime=date("Y-m-d");
			 $this->db->where('starting_date<=', $current_datetime);	
			 if ($vehicle==1)  
			 {
				 $this->db->where('entryassisgnedto', 0);
			 }
			 
			 if ($accgroup>-1)  
			 {
					 $this->db->where('accmasaccounts.group_code', $accgroup);
			 }
			 
			 if ($task>-1)  
			 {
				 $this->db->where('trntask2.task_code', $task);
			 }
			 
			 if ($stage>-1)				 
			 {
				 $this->db->where('movetotask', $stage);
			 }	
			   
		 }
			  
		 else
		 {
			   //  $this->db->where('trntask2.task_code', 0);
				  //$this->db->where('movetotask', 1);
				 $data['accgroup'] =-100;
				 $data['stage'] =-100;	 				
				 $data['task'] =-100;
				 $data['vehicle'] =1; 
		 }
		  $this->load->view('viewalltest',$data);			
		
		 
		 //followupdoneby,entrydoneby,verificationdoneby,finalstagedoneby
		 //entrylevelreverseby,verificationlevelreverseby,finalstagereverseby
		 
	 }	
	public function viweall1()
	{ 
	   
		 if (isset($_POST['stage']))
		{
            $vehicle=0;	
            if (isset($_POST['accgroup']))	{ $vehicle=$_POST["vehicle"];		}
			
            $stage=$_POST["stage"];	
			$task=$_POST["task"];			 
			$accgroup=$_POST["accgroup"];
			$gender=$_POST["gender"];
			
			$data['task'] =$task;
			$data['stage']= $stage;
			$data['accgroup']= $accgroup;
			$data['vehicle']= $vehicle;
			$data['gender']= $gender;
			//-100 none // -1 all // in followup
			echo $stage;
			if ($stage==-1)  { }			
			else  if ($stage>-1){$this->db->where('movetotask', $stage); }
			
			if ($task==0){}
			else if ($task>0)  {$this->db->where('trntask2.task_code', $task);  }
			 
            // Link ITR  Defective IT  Processed IT   Verified IT
       
            if ($gender==1)  
		    {
		    	$this->db->where('verified>=',0);	
                $this->db->where('verified<=',1);	
				 
			}            
            else if ($gender==2)  
		    {
		    	$this->db->where('verified',3);			
				 
			}
			else if ($gender==3)  
		    {
		    	$this->db->where('verified',4);		
				 
			}
			else if ($gender==4)  
		    {
		    	$this->db->where('verified',2);		
				 
			}
           	if ($vehicle==1)  
		    {
				$this->db->where('entryassisgnedto', 0);
			}
			
			$current_datetime=date("Y-m-d");
            $this->db->where('starting_date<=', $current_datetime);	 
			if ($accgroup>-1)  
		    {
					$this->db->where('accmasaccounts.group_code', $accgroup);
			} 
        
		
		    $this->db->order_by('trntask2.task_code,ac_name,trntask2.ac_code'); 
		
	    $this->db->select('trnbilling2.bill_date,trnbilling2.comp_id,trnbilling2.bill_no,billed,starting_date,target_date,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,entrydoneat,accmasaccounts.contactno,trntask2.remarks,remarks1,remarks2,remarks3,trntask2.id,
		followupassignto,masfollowupassign.username as followupassingnto,
		followupdoneby,masfollowup.username as followupby,
		entrydoneby,masentrydone.username as entrydone,
		verificationdoneby,masverificationdone.username as verificationdone,
		finalstagedoneby,masfinalstagedone.username as finalstagedone,	
		verificationassignto,masverificationassign.username as verificationassign,
		accmasaccounts.group_code,movetotask,stage_name');	
		
	    $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code'); 
		$this->db->join('masstage', 'masstage.stage_code = trntask2.movetotask','left'); 
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp masfollowup', 'masfollowup.emp_code = trntask2.followupdoneby','left');
        $this->db->join('masemp masentrydone', 'masentrydone.emp_code = trntask2.entryassisgnedto','left');
        $this->db->join('masemp masfollowupassign', 'masfollowupassign.emp_code = trntask2.followupassignto','left');		
		$this->db->join('masemp masverificationassign', 'masverificationassign.emp_code = trntask2.verificationassignto','left');
        $this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('masemp masfinalstagedone', 'masfinalstagedone.emp_code = trntask2.finalstagedoneby','left'); 
        $this->db->join('trnbilling2', 'trnbilling2.id = trntask2.id','left');  		
	    $data['client'] = $this->db->get('trntask2')->result_array();
		$this->load->view('viewall1',$data);	
		}
       
	}
	public function viwealltest1()
	{ 
	  
		 if (isset($_POST['stage']))
		{
            $vehicle=0;	
            if (isset($_POST['accgroup']))	{ $vehicle=$_POST["vehicle"];		}
			
			$accgroup=$_POST["accgroup"];$data['accgroup']= $accgroup;
            $stage=$_POST["stage"];	$data['stage']= $stage;
			$task=$_POST["task"];$data['task'] =$task;	 
			 
			 
		//	if ($stage==-1)  { }			
			//else  if ($stage>-1){$this->db->where('movetotask', $stage); }
			
			//if ($task==0){}
			//else if ($task>0)  {$this->db->where('trntask2.task_code', $task);  }
		 
			if ($task>0)  {$this->db->where('trntask2.task_code', $task);  }
			{$this->db->where('movetotask', $stage); }
			   
			$current_datetime=date("Y-m-d");
            $this->db->where('starting_date<=', $current_datetime);	 
			if ($accgroup>-1)  
		    {
					$this->db->where('accmasaccounts.group_code', $accgroup);
			} 
        
		
		$this->db->order_by('followupdoneat,entrydoneat,trntask2.task_code,ac_name,trntask2.ac_code'); 
	    $this->db->select('followupdoneat,trnbilling2.bill_date,trnbilling2.comp_id,trnbilling2.bill_no,billed,starting_date,target_date,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,entrydoneat,accmasaccounts.contactno,trntask2.remarks,remarks1,remarks2,remarks3,trntask2.id,
		followupassignto,masfollowupassign.username as followupassingnto,
		followupdoneby,masfollowup.username as followupby,
		entrydoneby,masentrydone.username as entrydone,
		verificationdoneby,masverificationdone.username as verificationdone,
		finalstagedoneby,masfinalstagedone.username as finalstagedone,	
		verificationassignto,masverificationassign.username as verificationassign,
		accmasaccounts.group_code,movetotask,stage_name');	
		
	    $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code'); 
		$this->db->join('masstage', 'masstage.stage_code = trntask2.movetotask','left'); 
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp masfollowup', 'masfollowup.emp_code = trntask2.followupdoneby','left');
        $this->db->join('masemp masentrydone', 'masentrydone.emp_code = trntask2.entryassisgnedto','left');
        $this->db->join('masemp masfollowupassign', 'masfollowupassign.emp_code = trntask2.followupassignto','left');		
		$this->db->join('masemp masverificationassign', 'masverificationassign.emp_code = trntask2.verificationassignto','left');
        $this->db->join('masemp masverificationdone', 'masverificationdone.emp_code = trntask2.verificationdoneby','left');
        $this->db->join('masemp masfinalstagedone', 'masfinalstagedone.emp_code = trntask2.finalstagedoneby','left'); 
        $this->db->join('trnbilling2', 'trnbilling2.id = trntask2.id','left');  		
	    $data['client'] = $this->db->get('trntask2')->result_array();
		$this->load->view('viewalltest1',$data);	
		}
       
	}
	public function saveveri()
	{		
		
		$task_value=$_POST["id"];		
       	$verificationassignto= $_POST['emp_code'];	
        $strSQL = "update trntask2 set verificationassignto=".$verificationassignto."  where id=".$task_value."";
		$this->db->query($strSQL);
       	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';      		
	}
	public function saveentry()
	{		
		
		$task_value=$_POST["id"];		
       	$entryassisgnedto= $_POST['emp_code'];	
        $strSQL = "update trntask2 set entryassisgnedto=".$entryassisgnedto."  where id=".$task_value."";
		$this->db->query($strSQL);
       	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';      		
	}
	
	public function saveentrya()
	{		
		
		$task_code=$_POST["id"];		
       	$followupassignto= $_POST['emp_code'];	
        $strSQL = "update trntask2 set followupassignto=".$followupassignto."  where task_code=".$task_code."";
		$this->db->query($strSQL);
       	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';      		
	}
	public function saveentryd()
	{		
		
		$task_value=$_POST["id"];		
       	$entryassisgnedto= $_POST['emp_code'];	
        $strSQL = "update trntask2 set entryassisgnedto=".$entryassisgnedto."  where id=".$task_value."";
		$this->db->query($strSQL);
       	
		echo '<script language="javascript">';
        echo 'alert("Linked successfully!!! ")';
        echo '</script>';      		
	}
	public function getentry()
	{
		
		$id=$_POST["id"];
		$column=$_POST["column"];		
		$entryassisgnedto=0;
		
		$str='';
		$str=$str."<select  id='getentry_$id' name='getentry'>";	 
            $this->db->order_by('empname');					
            $this->db->select('empname,emp_code');                      
            $castxe= $this->db->get('masemp');	
		 
		
		$row = $this->db->query("SELECT  entryassisgnedto FROM trntask2 WHERE  id='$id'")->row();		 
        if($row) {
			 
			 if ($row->entryassisgnedto==0)
			 {
				// $str=$str. "<option value=0 'selected'> Not Assigned</option>";
			 }
			 $entryassisgnedto=$row->entryassisgnedto;
				// echo "<span style='color:red;font-weight:bold' class='status-available'> This pan linked with [$row->ac_name],  State   [row->tin_no]</span>";
				 
		}
		 
		 
			
			foreach($castxe->result() as $data)
				{
				    $str=$str. "<option value='$data->emp_code'";     
                    	if($data->emp_code==$entryassisgnedto) {echo "selected";}								
				    $str=$str.">$data->empname</option>";
				} 
		 
		$str=$str.'</select>';
		echo $str;
		
	}
	
	public function savecompany()
	{
		$id=$this->uri->segment(3); 
		
	    $companyname= $_POST['companyname']; 	
		$address1= $_POST['address1']; 
        $email= $_POST['email'];	
		$contactnos= $_POST['contactnos'];	
        $strSQL="update msacompany set company_name ='". $companyname."',
                 address1 ='". $address1."',contactnos ='". $contactnos."',email ='". $email."'
		where comp_id=". $id."";   		
        $this->db->query($strSQL);  		
		$this->main();		
	}
	
	 
}
