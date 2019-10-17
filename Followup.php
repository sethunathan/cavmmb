<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Followup extends CI_Controller {
	function __construct()
    {
        parent::__construct();
      
        $this->load->library('session');	  
        $this->load->helper('url');
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
        
    }
	public function paymentlistit()

	{	
	   $branchcode = $this->session->userdata('branchcode');
	   $data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
             
			  $this->db->where('trntask2.task_code', $_POST['followupp']);
			  $data['followupp'] = $_POST['followupp'];
        }
		else
		{
			
		}
		 
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask2.task_code', $comp_id);
			  $data['followupp'] =$comp_id;
        }
		else
		{
			 
		}		 
		
		$this->db->where('trntask2.movetotask =',3.5);	
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branchcode);	
		}
		$this->db->where('job_code', 3);
	    $this->db->order_by('trntask3.reminder_code,reminder_date,followupdoneat,nextreminderat,
		trntask2.id,trntask1.task_code,ac_name,trntask2.ac_code');
		
	    $this->db->select('gstid,gstpwd,empname,followupdoneat,nextreminderat,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id,gstid,gstpwd,remindername,reminder_date,
		  accmasaccounts.group_code,clarificationremarks,clarificationreverse  ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
		$this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
	    $this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
	    $this->db->join('masreminder', 'trntask3.reminder_code = masreminder.reminder_code','left');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('paymentlistalterit',$data);	
	}
	  
	public function paymentlistgst()

	{	
	   $branchcode = $this->session->userdata('branchcode');
	   $data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
             
			  $this->db->where('trntask2.task_code', $_POST['followupp']);
			  $data['followupp'] = $_POST['followupp'];
        }
		else
		{
			
		}
		 
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask2.task_code', $comp_id);
			  $data['followupp'] =$comp_id;
        }
		else
		{
			 
		}		 
		
		$this->db->where('trntask2.movetotask =',3.5);	
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branchcode);	
		}
		$this->db->where('job_code', 4);
		$this->db->where('billed', 0);//sethu 08 05 2019
	    $this->db->order_by('trntask3.reminder_code,reminder_date,followupdoneat,nextreminderat,
		trntask2.id,trntask1.task_code,ac_name,trntask2.ac_code');
		
	    $this->db->select('empname,followupdoneat,nextreminderat,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id,gstid,gstpwd,remindername,reminder_date,
		  accmasaccounts.group_code,clarificationremarks,clarificationreverse  ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
		$this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
	    $this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
	    $this->db->join('masreminder', 'trntask3.reminder_code = masreminder.reminder_code','left');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('paymentlistaltergst',$data);	
	}
	  
	public function chat()
	{			
        $this->load->view('chat');
	}
	public function index()

	{	
	   $branchcode = $this->session->userdata('branchcode');
	   $data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
             
			  $this->db->where('trntask2.task_code', $_POST['followupp']);
			  $data['followupp'] = $_POST['followupp'];
        }
		else
		{
			 // $this->db->where('trntask1.task_code', 0);
			 // $data['followupp'] =0;
		}
		 
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask2.task_code', $comp_id);
			  $data['followupp'] =$comp_id;
        }
		else
		{
			 // $this->db->where('trntask1.task_code', 0);
			 // $data['followupp'] =0;
		}
		 
		 //$this->db->where('followupassignto', $emp_code);
		$this->db->where('job_code', 4);
		$this->db->where('trntask2.movetotask =',0);
		//$this->db->where('movetotask', 0);	
		//$this->db->where_in('subjob_code', array('1','3','4','6','12'));
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branchcode);	
		}
		
	    $this->db->order_by('trntask3.reminder_code,reminder_date,followupdoneat,nextreminderat,
		trntask2.id,trntask1.task_code,ac_name,trntask2.ac_code');
		
	    $this->db->select('empname,followupdoneat,nextreminderat,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id,gstid,gstpwd,remindername,reminder_date,
		  accmasaccounts.group_code,clarificationremarks,clarificationreverse  ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
		$this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
	    $this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
	    $this->db->join('masreminder', 'trntask3.reminder_code = masreminder.reminder_code','left');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('followupalter',$data);	
	}
	public function futurelist()

	{	
	   $branchcode = $this->session->userdata('branchcode');
	   $data['followupp'] = 0;
	   
		if (isset($_POST['followupp']))
			{
             
			  $this->db->where('trntask2.task_code', $_POST['followupp']);
			  $data['followupp'] = $_POST['followupp'];
        }
		else
		{
			 // $this->db->where('trntask1.task_code', 0);
			 // $data['followupp'] =0;
		}
		 
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask2.task_code', $comp_id);
			  $data['followupp'] =$comp_id;
        }
		else
		{
			 // $this->db->where('trntask1.task_code', 0);
			 // $data['followupp'] =0;
		}
		 
		 //$this->db->where('followupassignto', $emp_code);
		//$this->db->where('job_code', 4);
		$this->db->where('trntask2.movetotask =',-2);
		//$this->db->where('movetotask', 0);	
		//$this->db->where_in('subjob_code', array('1','3','4','6','12'));
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branchcode);	
		}
		
	    $this->db->order_by('trntask3.reminder_code,reminder_date,followupdoneat,nextreminderat,
		trntask2.id,trntask1.task_code,ac_name,trntask2.ac_code');
		
	    $this->db->select('empname,followupdoneat,nextreminderat,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id,gstid,gstpwd,remindername,reminder_date,
		  accmasaccounts.group_code,clarificationremarks,clarificationreverse  ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
		$this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
	    $this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
	    $this->db->join('masreminder', 'trntask3.reminder_code = masreminder.reminder_code','left');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('futurelistalter',$data);	
	}
	  
	 
	 //1.NOT ATTENDED 2.ATTENDED
	public function savereminder()

	{
        $id=$_POST["id"];
		$task_code=$_POST["task_code"];
		 
		$action=$_POST["action"];		
		$reminder_code=$_POST["reminder_code"];
		$reminder_date=$_POST["reminder_date"];
		$remarks=$_POST["remarks"];
		$reminder_date = substr($reminder_date, 6, 4).'-'.substr($reminder_date,3, 2).'-'.substr($reminder_date,0, 2);	
		
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
	 
       
      					
		if($action=="postpone")
		{
          $strSQL ="update trntask2 set
            		remarks='".$remarks."',
		            followupdoneby='".$emp_code."',
					nextreminderat='".$reminder_date."',  
					followupdoneat='".$current_datetime."'  
					where id='".$id."'";
		  
	    $this->db->query($strSQL);  
		 
		
		$this->db->where('id', $id);
       	$query = $this->db->get("trntask3");
        if ($query->num_rows() == 0) 
		{
				
		    $strSQL = "INSERT INTO trntask3 ";			
                    $strSQL .="(task_code,id,reminder_code,reminder_date) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$task_code."','".$id."','".$reminder_code."','".$reminder_date."') ";	          
			        $this->db->query($strSQL);		
		   }
		$strSQL ="update trntask3 set task_code='".$task_code."',
		              reminder_code='".$reminder_code."',remarks='".$remarks."',
			          reminder_date='".$reminder_date."'
			          where id='".$id."'";
	    $this->db->query($strSQL);  
		 
		echo 'Updated Sucessfully';			
		}
		elseif($action=="postpone1")
		{
            //$strSQL ="update trntask2 set movetotask=10  where id='".$id."'";
			//$this->db->query($strSQL);  
		}
		 
	}
	//SAVE TNIL MOVE TO BILL
	public function savenil()

	{
        $id=$_POST["id"];
		$task_code=$_POST["task_code"];
		$reminder_code=$_POST["reminder_code"];
		$remarks=$_POST["remarks"];		
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
		 
        $strSQL ="update trntask2 set movetotask=3
		,
            		remarks='".$remarks."',
		            followupdoneby='".$emp_code."',					
					followupdoneat='".$current_datetime."'  
					where id='".$id."'";
		  
	    $this->db->query($strSQL);  
		 
		
		$this->db->where('id', $id);
       	$query = $this->db->get("trntask3");
        if ($query->num_rows() == 0) 
		{
				
		    $strSQL = "INSERT INTO trntask3 ";			
                    $strSQL .="(task_code,id,reminder_code) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$task_code."','".$id."','".$reminder_code."') ";	          
			        $this->db->query($strSQL);		
		   }
		$strSQL ="update trntask3 set task_code='".$task_code."',
		              reminder_code='".$reminder_code."',remarks='".$remarks."'		          
			          where id='".$id."'";
	    $this->db->query($strSQL);  
		 
		echo 'Updated Sucessfully';			
		 
		 
		 
	}
	public function movetoentrylevel()

	{
        $id=$_POST["id"];
		$action=$_POST["action"];		 
		$remarks=$_POST["remarks"];
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
		//echo $strSQL;
		if($action=="movetoentrylevel")
		{
          $strSQL ="update trntask2 set movetotask=1,
		        followupdoneby='".$emp_code."',
				followupdoneat='".$current_datetime."',
				remarks='".$remarks."'
				where id='".$id."'";	
	      $this->db->query($strSQL);  
		}
		 
				 
		
		
	}
	public function movetoentrylevelmodal()

	{
        $id=$_POST["id"];
		$action=$_POST["action"];		 
		$remarks=$_POST["remarks"];
		
		$task_code=$_POST["task_code"];
		$reminder_date=$_POST["reminder_date"];
		$reminder_date = substr($reminder_date, 6, 4).'-'.substr($reminder_date,3, 2).'-'.substr($reminder_date,0, 2);	
		$reminder_code=$_POST["reminder_code"];
		
		$ppreve =$_POST["ppreve"];	
	    $pcurrent=$_POST["pcurrent"];	
	    $pnext=$_POST["pnext"];	
        $spreve=$_POST["spreve"];	
        $scurrent=$_POST["scurrent"];	
        $snext=$_POST["snext"];	
	    $receipt_mode=$_POST["receipt_mode"];	
		 
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
		
		if($action=="movetoentrylevelmodal")
		{
            $strSQL ="update trntask2 set movetotask=1,
		          followupdoneby='".$emp_code."',
				  followupdoneat='".$current_datetime."',
				  remarks='".$remarks."'
				  where id='".$id."'";	
	             $this->db->query($strSQL);  
		   echo $strSQL;
		//    $this->db->where('id', $id);
         	//$query = $this->db->get("trntask3");
           // if ($query->num_rows() == 0) 
	    //	{
				
		  //     $strSQL = "INSERT INTO trntask3 ";			
         //           $strSQL .="(task_code,id,reminder_code,reminder_date) ";
         //           $strSQL .="VALUES ";
        //            $strSQL .="('".$task_code."','".$id."','".$reminder_code."','".$reminder_date."') ";	          
		//	        $this->db->query($strSQL);		
		//   }
		//    $strSQL ="update trntask3 set task_code='".$task_code."',
		//              reminder_code='".$reminder_code."',remarks='".$remarks."',
		//	          reminder_date='".$reminder_date."'
		//	          where id='".$id."'";
	    //    $this->db->query($strSQL);  
		//	
		 //    $strSQL ="update trntask3 set ppreve='".$ppreve."',
		 //             pcurrent='".$pcurrent."',pnext='".$pnext."',
		//	          spreve='".$spreve."',scurrent='".$scurrent."',snext='".$snext."'
		//			  ,receipt_mode='".$receipt_mode."'
		//	          where id='".$id."'";
	     //   $this->db->query($strSQL);  
		echo "      Updated Sucessfully";	
			
			
		}
		
	}
	public function movetoverificationlevelmodal()

	{
        $id=$_POST["id"];
		$action=$_POST["action"];		 
		$remarks1=$_POST["remarks1"];
		
		$task_code=$_POST["task_code"];
		
		
		$ppreve =$_POST["ppreve"];	
	    $pcurrent=$_POST["pcurrent"];	
	    $pnext=$_POST["pnext"];	
        $spreve=$_POST["spreve"];	
        $scurrent=$_POST["scurrent"];	
        $snext=$_POST["snext"];	
	    $receipt_mode=$_POST["receipt_mode"];

        $verificationassignto=$_POST["emp_code"];			
		 
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
		
		if($action=="movetoverificationlevelmodal")
		{
            $strSQL ="update trntask2 set movetotask=2,
			      entrydoneby='".$emp_code."'	,	        
				  entrydoneat='".$current_datetime."',
				  entryassisgnedto='".$verificationassignto."'	,
				  remarks1='".$remarks1."'
				  where id='".$id."'";	
	             $this->db->query($strSQL);  
		
		      //self 
			$orderr = 0;			
            $row = $this->db->query("SELECT MAX(entryandverfiorder) AS maxid FROM trntask2
         			where entryassisgnedto=$emp_code")->row();
            if ($row)
			   {
				    
                    $orderr = $row->maxid+1; 
				    
			   }
			
		 
		    $strSQL ="update trntask2 set entryandverfiorder='".$orderr."' where id='".$id."'";
            //self	
			
		
		
		
		
		
		    $this->db->where('id', $id);
         	$query = $this->db->get("trntask3");
            if ($query->num_rows() == 0) 
	    	{
				
		       $strSQL = "INSERT INTO trntask3 ";			
                    $strSQL .="(task_code,id) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$task_code."','".$id."') ";	          
			        $this->db->query($strSQL);		
		   }
		    $strSQL ="update trntask3 set task_code='".$task_code."',
		              remarks1='".$remarks1."'
			          where id='".$id."'";
	        $this->db->query($strSQL);  
			
		     $strSQL ="update trntask3 set ppreve='".$ppreve."',
		              pcurrent='".$pcurrent."',pnext='".$pnext."',
			          spreve='".$spreve."',scurrent='".$scurrent."',snext='".$snext."'
					  ,receipt_mode='".$receipt_mode."'
			          where id='".$id."'";
	        $this->db->query($strSQL);  
		echo "      Updated Sucessfully";	
			
			
		}
		elseif($action=="reversetofollowplevelmodal")
		{
            $strSQL ="update trntask2 set movetotask=0,
			      entrylevelreverseby='".$emp_code."'	,	        
				  entrylevelreversedoneat='".$current_datetime."',
				  remarks1='".$remarks1."'
				  where id='".$id."'";	
	             $this->db->query($strSQL);  
		
		    $this->db->where('id', $id);
         	$query = $this->db->get("trntask3");
            if ($query->num_rows() == 0) 
	    	{
				
		       $strSQL = "INSERT INTO trntask3 ";			
                    $strSQL .="(task_code,id) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$task_code."','".$id."') ";	          
			        $this->db->query($strSQL);		
		   }
		    $strSQL ="update trntask3 set task_code='".$task_code."',
		              remarks1='".$remarks1."'
			          where id='".$id."'";
	        $this->db->query($strSQL);  
			
		     $strSQL ="update trntask3 set  reminder_code='-1',ppreve='".$ppreve."',
		              pcurrent='".$pcurrent."',pnext='".$pnext."',
			          spreve='".$spreve."',scurrent='".$scurrent."',snext='".$snext."'
					  ,receipt_mode='".$receipt_mode."'
			          where id='".$id."'";
	        $this->db->query($strSQL);  
		echo "      Updated Sucessfully";	
			
			
		}
		
		
		
	}
		
	public function saveremarks()

	{
        $id=$_POST["id"];
		$column=$_POST["column"];
         $str= $this->stripHTMLtags($_POST["editval"]);		
        $strSQL ="update trntask2 set $column='".$str."'    where id='".$id."'";	
	    $this->db->query($strSQL);      
	}
	private function stripHTMLtags($str)
{
    $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
    $t = htmlentities($t, ENT_QUOTES, "UTF-8");
    return $t;
}
	public function savegstaccmasaccounts()

	{
        $ac_code=$_POST["ac_code"];
		$column=$_POST["column"];	
        $str= $this->stripHTMLtags($_POST["editval"]);
      	  $strSQL ="update accmasaccounts set $column='".$str."'    where ac_code='".$ac_code."'";	
         	
	    $this->db->query($strSQL);  
    
	}
	
	 
	public function task()

	{	
	    $branchcode = $this->session->userdata('branchcode');
		
		
		$data['taskk'] = 0;
		if (isset($_POST['taskk']))
			{
             
			  $this->db->where('trntask1.task_code', $_POST['taskk']);
			  $data['taskk'] = $_POST['taskk'];
        }
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask1.task_code', $comp_id);
			  $data['taskk'] =$comp_id;
        }
		
		$ac_code=$this->uri->segment(4); 	
		if (isset($ac_code))
			{
             
			  $this->db->where('trntask2.ac_code', $ac_code);
			  $data['ac_code'] =$ac_code;
        }
		
			//self assign
		$id=$this->uri->segment(5); 	
		if (isset($id))
		{
		    
			$emp_code = $this->session->userdata('emp_code');
			$orderr = 0;			
            $row = $this->db->query("SELECT MAX(entryandverfiorder) AS maxid FROM trntask2
         			where entryassisgnedto=$emp_code")->row();
            if ($row)
			   {
				    
                    $orderr = $row->maxid+1; 
				    
			   }
			
		 
		    $strSQL ="update trntask2 set entryassisgnedto='".$emp_code."' ,
     			entryandverfiorder='".$orderr."' where id='".$id."'";
		   // $strSQL ="update trntask2 set entryassisgnedto='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  		   
	    }
		//self assign
		
		//$this->db->where_in('subjob_code', array('1','3','4','6','12'));
		$this->db->where('job_code', 4);	
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branchcode);	
		}
		//$this->db->where('group_code', $branchcode);	
		$this->db->where('movetotask', 1);	
	    $this->db->order_by('followupdoneat,trntask2.id,trntask2.task_code,ac_name'); 

		
	    $this->db->select('ppreve,pcurrent,spreve,scurrent,empname,followupdoneat,gstid,
		gstpwd,ac_name,trntask2.ac_code,trntask2.task_code,
		accmasaccounts.contactno,trntask2.remarks,gstid,trntask2.id,task_name,accmasaccounts.group_code');
	    $this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp', 'masemp.emp_code = trntask2.followupdoneby','left')	;	
		$this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');	
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('followuptask',$data);	
	}
	public function movetotask1()

	{
		//entry level
        $id=$_POST["id"];$action=$_POST["action"];
		$emp_code = $this->session->userdata('emp_code');
		if($action=="delete")
		{
            $strSQL ="update trntask2 set movetotask=2,entrydoneby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
		}
		elseif($action=="reverse")
		{
            $strSQL ="update trntask2 set movetotask=0,entrylevelreverseby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
		elseif($action=="future")
		{
            $strSQL ="update trntask2 set movetotask=-2   where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
		elseif($action=="billing")
		{
            $strSQL ="update trntask2 set movetotask=4,billingmoveby='".$emp_code."'   where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
		elseif($action=="followp")
		{
            $strSQL ="update trntask2 set movetotask=0   where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
		
	    
	}	
	 public function saveremarks1()

	{
        $id=$_POST["id"];
        $strSQL ="update trntask2 set remarks1='".$_POST["editval"]."'
			            where id='".$id."'";
	   $this->db->query($strSQL);  
     
	}
	public function verification()

	{	
	    $data['verificationn'] = 1;
		if (isset($_POST['verificationn']))
			{
             
			  $this->db->where('trntask2.task_code', $_POST['verificationn']);
			  $data['verificationn'] = $_POST['verificationn'];
        }
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask1.task_code', $comp_id);
			  $data['verificationn'] =$comp_id;
        }
		
		$ac_code=$this->uri->segment(4); 	
		if (isset($ac_code))
			{
             
			  $this->db->where('trntask2.ac_code', $ac_code);
			  $data['ac_code'] =$ac_code;
        }
	    $emp_code = $this->session->userdata('emp_code');
	    $branchcode = $this->session->userdata('branchcode');
		
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			//$this->db->where('group_code', $branchcode);
            $this->db->where('entrydoneby !=', $emp_code);			
		    $this->db->where('group_code', $branchcode);			
		}
		
			
		$this->db->where('movetotask', 2);	
	    $this->db->order_by('nameid,trntask2.id'); //order by
		$this->db->where('job_code', 4);	
		 
	     
		$this->db->select('entrydoneat, DATEDIFF(STR_TO_DATE(CONCAT(SUBSTRING(entrydoneat,1,2), "-",SUBSTRING(entrydoneat,4,2), "-",SUBSTRING(entrydoneat,7,4)),"%d-%m-%Y"),NOW()) AS nameid');
	    $this->db->select('empname, 		    	
		entrydoneat,ac_name,task_name, trntask2.id, trntask2.ac_code,trntask2.ac_code,gstid,gstpwd,trntask2.remarks,
		trntask2.task_code,gst,gstpwd,accmasaccounts.contactno,
		,accmasaccounts.group_code');
	    $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code'); 
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp', 'masemp.emp_code = trntask2.entrydoneby','left')	;	
	//	$this->db->join('trntask3', 'trntask3.id = trntask2.id','left');	
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('verification',$data);	
	}
	public function movetotask2()

	{
        $id=$_POST["id"];
        $action=$_POST["action"];
		$emp_code = $this->session->userdata('emp_code');
		if($action=="delete")
		{
            $strSQL ="update trntask2 set movetotask=4,verificationdoneby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL); 
		}
		else if($action=="insert")
		{
            //$strSQL ="update trntask2 set movetotask=4,verificationdoneby='".$emp_code."'  where id='".$id."'";
			//$this->db->query($strSQL);  
            
            $ac_code=0;
            $row = $this->db->query("SELECT  ac_code FROM  trntask2 where id=$id   ")->row();
            if ($row)
			{

             $ac_code=$row->ac_code;
			}

            $bill_no = 0;

            		
            $row = $this->db->query('SELECT MAX(bill_no) AS maxid FROM  trnbilling1')->row();
            $bill_date = date("d-m-Y");
            if ($row)
			   {
				   if ($ac_code)
				   {
                    $bill_no = $row->maxid+1; 
				    
				    $amount=$_POST["amount"];

				    $taxper=$_POST["taxper"];
				    $taxamt=$_POST["taxamt"];	
				    
				    $remarks=$_POST["remarks"];

				    $strSQL = "INSERT INTO trnbilling1 ";			
                    $strSQL .="(comp_id,bill_no,bill_date,remarks,task_id,ac_code,amount,taxper,taxamt,emp_code) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$bill_no.",".$bill_no.",'".$bill_date."','".$remarks."',".$id.",".$ac_code.",".$amount.",".$taxper.",".$taxamt.",".$emp_code.") ";	          
			        $this->db->query($strSQL);
			        
                     echo "Updated ";		
			         
				   }
				  }            



		}
		elseif($action=="payment")
		{
            $strSQL ="update trntask2 set movetotask=3.5,paymentleveldoneby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
		elseif($action=="reverse")
		{
            $strSQL ="update trntask2 set movetotask=0,verificationlevelreverseby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
	    
	}	
	
	 public function saveremarks2()

	{
        $id=$_POST["id"];
        $strSQL ="update trntask2 set remarks2='".$_POST["editval"]."'
			            where id='".$id."'";
	   $this->db->query($strSQL);  
     
	}
 
	 
	public function finalstage()

	{	
	    $branchcode = $this->session->userdata('branchcode');
		$this->db->where('group_code', $branchcode);	
		$this->db->where('movetotask', 3);	
	    $this->db->order_by('id,task_code,ac_name,trntask2.ac_code');   
	    $this->db->select('ac_name,trntask2.ac_code,task_code,contactno,remarks,remarks1,remarks2,remarks3,id,remarks1,accmasaccounts.group_code');
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');   
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('finalstage',$data);	
	}
	public function movetotask3()

	{
        $id=$_POST["id"];$action=$_POST["action"];
		$emp_code = $this->session->userdata('emp_code');
		if($action=="delete")
		{
            $strSQL ="update trntask2 set movetotask=4,finalstagedoneby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
		}
		elseif($action=="reverse")
		{
            $strSQL ="update trntask2 set movetotask=2,finalstagereverseby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
			
		}
	    
	}	
	 public function saveremarks3()

	{
        $id=$_POST["id"];
        $strSQL ="update trntask2 set remarks3='".$_POST["editval"]."'
			            where id='".$id."'";
	   $this->db->query($strSQL);  
     
	}
    public function getremarks()

	{
        $id=$_POST["id"];      
	    $row = $this->db->query("SELECT  clarificationremarks  FROM  trntask2 where id=$id ")->row();
           if ($row)
			   {
            echo $row->clarificationremarks;
			   }
			else {echo '-';}   
	}
	 
	 public function getreminder()

	{
		$remarks='No Remarks';
        $id=$_POST["id"]; 
          $task_code=$_POST["task_code"];     		
	    $row = $this->db->query("SELECT  reminder_code,reminder_date,remarks,receipt_mode,
           		ppreve,pcurrent,pnext,spreve,scurrent,snext FROM  trntask3 where id=$id   ")->row();
           if ($row)
			{
             $reg_date=$row->reminder_date;			 
			 $reg_date = date("d-m-Y", strtotime($reg_date));
			 
             echo $row->reminder_code."$".$reg_date."$".
			 $row->remarks."$".$row->receipt_mode."$".
			 $row->ppreve."$".$row->pcurrent."$".
			 $row->pnext."$".$row->spreve."$".
			 $row->scurrent."$".$row->snext;
			}
			else {
				  $row = $this->db->query("SELECT  remarks  FROM  trntask2 where id=$id   ")->row();
                 if ($row){$remarks=$row->remarks;}
				 $current_datetime = date("d-m-Y");
				 $reminder_code=0;
				 
				  echo "1$$current_datetime$$remarks$0$0$0$0$0$0$0";
				}   
	} 		
	
	public function getentrylevelreminder()

	{
		$remarks='No Remarks';	$remarks1='No Remarks1';
        $id=$_POST["id"]; 
        $task_code=$_POST["task_code"];     		
	    $row = $this->db->query("SELECT  remarks,remarks1,receipt_mode,
           		ppreve,pcurrent,pnext,spreve,scurrent,snext FROM  trntask3 where id=$id   ")->row();
           if ($row)
			{
             echo $row->remarks1."$".$row->receipt_mode."$".
			 $row->ppreve."$".$row->pcurrent."$".
			 $row->pnext."$".$row->spreve."$".
			 $row->scurrent."$".$row->snext."$".$row->remarks;
			}
			else {
				  $row = $this->db->query("SELECT  remarks1,remarks FROM  trntask2 where id=$id   ")->row();
                 if ($row){$remarks1=$row->remarks1;$remarks=$row->remarks;}			
				 $reminder_code=0;
				 
				  echo "$remarks1$0$0$0$0$0$0$0$remarks";
				}   
	} 
    
	public function getbilling()

	  {
		 
        $id=$_POST["id"]; 
		$subjob_code=0; 
        $task_code=$_POST["task_code"]; 
       
	    $row = $this->db->query("SELECT  subjob_code from trntask1  where task_code=$task_code   ")->row();
        if ($row)
			{
				$subjob_code=$row->subjob_code;
			}
			
	    $row = $this->db->query("SELECT  sac,amount,taxper from massubjob  where subjob_code=$subjob_code   ")->row();
        if ($row)
			{
             echo $row->sac."$".$row->amount."$".$row->taxper;
			}
			 
	   }//getbilling		
	 
	    
	public function getselect2task()

	  {
		 
		$echostr='';
        $id=$_POST["id"]; 
	    		
		$previousCountry = null; 
		//$this->db->where('task_code',$id) ;
		
	    $this->db->where('job_code',4) ;
	    $this->db->order_by('subjobname,trntask1.subjob_code');   
    	$this->db->select('task_code,task_name,subjobname,trntask1.subjob_code');
    	$this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');	     
        $castxe= $this->db->get('massubjob');
        foreach ($castxe->result() as $airport)
		{
              if ($previousCountry != $airport->subjobname) 
				{ 
					$echostr.="<optgroup label='$airport->subjobname'>";
				}
	            $echostr.= "<option  value= '$airport->task_code'";			
				$echostr.= ">$airport->task_name</option>";
                $previousCountry = $airport->subjobname; 
				 if ($previousCountry != $airport->subjobname) 
				{ 
					$echostr.="</optgroup>";
				}
		}
        if ($previousCountry !== null) 
			{
				$echostr.= '';
			}
			
        echo $echostr;
	   }//getselect2task		
	 
	 
}	//class
 
?>