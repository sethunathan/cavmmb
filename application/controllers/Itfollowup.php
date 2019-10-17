<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItFollowup extends CI_Controller {
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
        		date_default_timezone_set('Asia/Kolkata');
    }
	public function sortablethreeb()
	{
		$strSQL='';	
		
		if(isset($_POST["row_orderb"]))
		{
			
			$id_ary = $_POST["row_orderb"];
            for($i=0;$i<count($id_ary);$i++)
				{
                    $strSQL="UPDATE trntask2 SET entryandverfiorder='" . $i . "' WHERE id=". $id_ary[$i];
                    $this->db->query($strSQL); 					
				}
				
        } 
        echo 'Completed';		
    }
	public function assingorder()
	{
			
		echo $emp_code=$this->uri->segment(3);
		echo $strSQL ="update trntask2 set entryassisgnedto=0,entryandverfiorder=0 where emp_code='".$emp_code."'";
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 1);		 
		$this->db->where('entryassisgnedto', $emp_code);		
		$this->db->distinct();	
        $this->db->where('starting_date<=', $current_datetime);	
	    $this->db->order_by('entryandverfiorder,task_code');   
	    $this->db->select('entryandverfiorder,id,entryassignorder,verificationassignorder,movetotask,accmasaccounts.ac_code,ac_name,massubjob.job_code,empname,entryassisgnedto,ending_date,
		starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
		$this->db->join('masemp', 'masemp.emp_code = trntask2.entryassisgnedto','left');     		
       
		$results1 =  $this->db->get('massubjob');
		
		$current_datetime=date("Y-m-d");
		$this->db->where('movetotask', 2);		 
		$this->db->where('verificationassignto', $emp_code);		
		$this->db->distinct();	
        $this->db->where('starting_date<=', $current_datetime);	
	    $this->db->order_by('entryandverfiorder,task_code');   
	    $this->db->select('entryandverfiorder,id,entryassignorder,verificationassignorder,movetotask,accmasaccounts.ac_code,ac_name,massubjob.job_code,empname,verificationassignto,ending_date,
		starting_date,subjobname,task_name,trntask1.task_code');
	    $this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');
        $this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code','left');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code','left');	
		$this->db->join('masemp', 'masemp.emp_code = trntask2.verificationassignto','left');
        $results2 =  $this->db->get('massubjob');	
		$results = array();
        if ($results1->num_rows()) 
        {
          $results = array_merge($results, $results1->result());
        }

       if ($results2->num_rows())
        {
         $results = array_merge($results, $results2->result());
        }
	    usort($results, function ($a, $b) { return strnatcmp($a->entryandverfiorder, $b->entryandverfiorder); });
        $data['showdetailtwo']=$results;
		
		$this->load->view('itfollowuptest',$data);	 
	}
	
    public function movetoitverification()

	{
        $id=$_POST["id"];
		$action=$_POST["action"];
        $verified=$_POST["verified"];
        $remarks4=$_POST["remarks4"];
        $itreturndate=$_POST["itreturndate"];     		
		$itreturndate = substr($itreturndate, 6, 4).'-'.substr($itreturndate,3, 2).'-'.substr($itreturndate,0, 2);		
		
		
        $strSQL ="update trntask2 set verified='".$verified."',
		             itreturndate='".$itreturndate."',
					 movetotask='4',  
					 remarks4='".$remarks4."'
				     where id='".$id."'";	
	             $this->db->query($strSQL);  		    
		 echo " Updated Sucessfully";			
		
	}	
	public function movetoverificationlevelmodal()

	{
        $id=$_POST["id"];
		$action=$_POST["action"];
        $verificationassignto=$_POST["emp_code"];
        $remarks=$_POST["remarks"];				
		 
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
		
		if($action=="movetoverificationlevelmodal")
		{
            $strSQL ="update trntask2 set movetotask=2,
			         entrydoneby='".$emp_code."',	        
				     entrydoneat='".$current_datetime."',
					 remarks='".$remarks."',
				     verificationassignto='".$verificationassignto."'	 
				     where id='".$id."'";	
	             $this->db->query($strSQL);  	

				 
            //self 
			$orderr = 0;			
            $row = $this->db->query("SELECT MAX(entryandverfiorder) AS maxid FROM trntask2
         			where verificationassignto=$emp_code")->row();
            if ($row)
			   {
				    
                    $orderr = $row->maxid+1; 
				    
			   }
			
		 
		    $strSQL ="update trntask2 set entryandverfiorder='".$orderr."' where id='".$id."'";
            //self	
			
		    echo " Updated Sucessfully";			
		}
	}
	public function index()

	{	
	   $comp_id=$this->uri->segment(3); 
	   $branchcode = $this->session->userdata('branchcode');
	   $data['followupp'] = 0;
		if (isset($_POST['followupp']))
			{
             
			  $this->db->where('trntask1.task_code', $_POST['followupp']);
			  $data['followupp'] = $_POST['followupp'];
        }
		 
			
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask1.task_code', $comp_id);
			  $data['followupp'] =$comp_id;
        }
		//$this->db->where('followupassignto', $emp_code); 
		$this->db->where('trntask2.movetotask <=',0);		
	    $this->db->where('job_code', 3);
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			//$this->db->where('group_code', $branchcode);
            		
		    $this->db->where('group_code', $branchcode);			
		}
		//$this->db->where('group_code', $branchcode);	
	    $this->db->order_by('nextreminderat,trntask2.id,trntask1.task_code,ac_name,trntask2.ac_code');   
	    $this->db->select('pan,empname,nextreminderat,task_name,ac_name,trntask2.ac_code,
		  trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id,gstid,gstpwd,
		  accmasaccounts.group_code,clarificationremarks,clarificationreverse  ');
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
		$this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');	   
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
		
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('itfollowupalter',$data);	
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
	
	public function saveremarks()

	{
        $id=$_POST["id"];
		$column=$_POST["column"];	
        $strSQL ="update trntask2 set $column='".$_POST["editval"]."'    where id='".$id."'";	
	    $this->db->query($strSQL);      
	}
	public function movetoentrylevel()

	{
        $id=$_POST["id"];
		$action=$_POST["action"];
		$emp_code = $this->session->userdata('emp_code');
		$current_datetime=date("d-m-Y H:i:s"); 	 
		if($action=="movetoentrylevel")
		{
          $strSQL ="update trntask2 set movetotask=1,
		        followupdoneby='".$emp_code."',
				followupdoneat='".$current_datetime."'			
				where id='".$id."'";	
	      $this->db->query($strSQL);  
		}
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
		
		$this->db->where('job_code', 3);
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
			$this->db->where('group_code', $branchcode);	 	
		    		
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
			$this->db->query($strSQL);  		   
	    }
		//self assign
		
		$this->db->where('movetotask', 1);	
	    $this->db->order_by('followupdoneat,trntask2.id,trntask2.task_code,ac_name'); 
	    $this->db->select('pan,itpwd,empname,followupdoneat,gstid,
		gstpwd,ac_name,trntask2.ac_code,trntask2.task_code,
		accmasaccounts.contactno,trntask2.remarks,gstid,trntask2.id,task_name,accmasaccounts.group_code');
	    $this->db->join('trntask1', 'trntask2.task_code = trntask1.task_code');
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp', 'masemp.emp_code = trntask2.followupdoneby','left')	;	
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('itfollowuptask',$data);	
	}
	
	public function movetotask1()

	{
        $id=$_POST["id"];$action=$_POST["action"];
		$emp_code = $this->session->userdata('emp_code');
		if($action=="verification")
		{
            $strSQL ="update trntask2 set movetotask=2,entrydoneby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
		}
		elseif($action=="reverse")
		{
            $strSQL ="update trntask2 set movetotask=0,entrylevelreverseby='".$emp_code."'  where id='".$id."'";
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
             
			  $this->db->where('trntask1.task_code', $_POST['verificationn']);
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
			 
            $this->db->where('entrydoneby !=', $emp_code);			
		    $this->db->where('group_code', $branchcode);			
		}
		
		$this->db->where('movetotask', 2);	
	    $this->db->order_by(' trntask2.id,trntask2.task_code,trntask2.ac_code'); //order by
		$this->db->where('job_code', 3);
	    $this->db->select('childtask_code,trntask1.subjob_code,empname,pan,itpwd,
		entrydoneat,ac_name,task_name, trntask2.id, trntask2.ac_code,trntask2.ac_code,gstid,gstpwd,trntask2.remarks,
		trntask2.task_code,gst,gstpwd,accmasaccounts.contactno,
		,accmasaccounts.group_code');
	    $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code'); 
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code'); 
        $this->db->join('masemp', 'masemp.emp_code = trntask2.entrydoneby','left')	;	
		$this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
        $this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');		
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('itverification',$data);	
	}
	public function movetotask2()

	{
        $id=$_POST["id"];$action=$_POST["action"];
		$emp_code = $this->session->userdata('emp_code');
		if($action=="billing")
		{
            $strSQL ="update trntask2 set movetotask=4,verificationdoneby='".$emp_code."'  where id='".$id."'";
			$this->db->query($strSQL);  
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
		elseif($action=="reverseentry")
		{
            $strSQL ="update trntask2 set movetotask=1,verificationlevelreverseby='".$emp_code."'  where id='".$id."'";
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
            $strSQL ="update trntask2 set movetotask=3.5,finalstagedoneby='".$emp_code."'  where id='".$id."'";
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
    public function getselect2task()

	  {
		 
		$echostr='';
		$selected=0;
		$nexttask=0;
		$childtask_code=$_POST["childtask_code"]; 
        
		 
        $ac_code=$_POST["ac_code"];  		
 
        $row = $this->db->query("SELECT id from trntask2  where task_code=$childtask_code and ac_code=$ac_code ")->row();
        if ($row)
			{
               echo "Fail"."$".'Link Already Attached '.$row->id;
			}
		else
        {			
				$previousCountry = null;
				//$this->db->where('job_code',4) ;
				$this->db->order_by('trntask1.task_code') ;
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
						 if($childtask_code==$airport->task_code){ 
						$echostr.= "selected";}				
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
					
				echo "Pass"."$".$echostr;
		}
	}//getselect2task

     public function savenextask()
	{
		
		$ac_code=$this->input->post("accode");
		$task_code=$this->input->post("nexttask");
        $nextbill=$this->input->post("nextbill");				
		$strSQL='';
		
		$id=$_POST["id"]; 
		$emp_code = $this->session->userdata('emp_code');
		$strSQL ="update trntask2 set movetotask=4,billingmoveby='".$emp_code."',verified='".$verified."',itreturndate='".$itreturndate."'   where id='".$id."'";
		$this->db->query($strSQL);  
		
		if ($nextbill==100)
		{
			
			$row = $this->db->query("SELECT id   from trntask2  where task_code=$task_code  and ac_code=$ac_code ")->row();
			if ($row)
				{
				 echo $str= " Already  Task assingned  to".$row->id;				  
				}
			else
			{	
			    $strSQL = "INSERT INTO trntask2 ";			
				$strSQL .="(task_code,ac_code) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$task_code."','".$ac_code."') ";
			    $this->db->query($strSQL);				 
			}
		}
	} //savenextask	
	}
 
?>