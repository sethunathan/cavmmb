<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
        
        $this->load->library('session');	  
        $this->load->helper('url');
		$this->load->library("pagination");
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
		date_default_timezone_set('Asia/Kolkata');
        
    }
	
	public function index() {		
        $this->load->view("others");
    }
	public function otherss() {		
        $this->load->view("otherss");
    }
	public function dupclient() {		
        $this->load->view("dupclient");
    }
	
	public function combineclient() {
		
	  	$ac_code1= $_POST['ac_code1']; 	
		$ac_code2= $_POST['ac_code2'];
          		
      		
        echo $strSQL="update trntask2 set ac_code ='".$ac_code2."'	where ac_code=". $ac_code1."";
        $this->db->query($strSQL);  
        
		$strSQL="update trnbilling1 set pty_code ='". $ac_code2."'	where pty_code=". $ac_code1."";
        $this->db->query($strSQL);  
		
        $strSQL="update trnbilling2 set pty_code ='". $ac_code2."'	where pty_code=". $ac_code1."";
        $this->db->query($strSQL);  
		
		$strSQL="update accentry set ac_code ='". $ac_code2."'	where ac_code=". $ac_code1."";
        $this->db->query($strSQL);  
		
		$strSQL="update accentry set oppac_code ='". $ac_code2."'	where oppac_code=". $ac_code1."";
        $this->db->query($strSQL);
		
        $strSQL="delete from accmasaccounts where ac_code=". $ac_code1."";
        $this->db->query($strSQL);  		
        
		$strSQL="delete from massetupjob where ac_code=". $ac_code1."";
        $this->db->query($strSQL);  
		  		
		 	
		echo '<script language="javascript">';
        echo 'alert("Client Merged successfully!!! ")';
        echo '</script>';
        $this->load->view("dupclient");
		
    }
	
	public function savemerge() {
		
	  	$task_code= $_POST['task_code'];	
        $ac_code= $_POST['ac_code']; 
		//print_r($ac_code);
		//$ac_codee= $_POST['ac_code']; 
		
		 $ac_code= $_POST['ac_code']; 
		 
		$active= $_POST['active']; 
			 
	    foreach($ac_code as $ac_value)
        {
             foreach($task_code as $task_value)
           {	
            	if ($active==1)
				{		
			        $this->db->where('task_code', $task_value);
					$this->db->where('ac_code', $ac_value);
                    $query = $this->db->get("trntask2");
                    if ($query->num_rows()== 0) 
					   {		     
			    
			            $strSQL = "INSERT INTO trntask2 ";			
                        $strSQL .="(task_code,ac_code) ";
                        $strSQL .="VALUES ";
                        $strSQL .="(".$task_value.",'".$ac_value."') ";
				        $this->db->query($strSQL);
					   }
					else if ($query->num_rows()> 0) 
						
					   {   
					      echo "Link already done for ".$task_value." ->".$ac_value." ";
					   }
                }
                else if ($active==0)
				{
				  $strSQL = "delete from trntask2 where task_code=".$task_value." and ac_code=".$ac_value." ";
				    $this->db->query($strSQL);
               
                }					
			 	
			}
        }
			 
			 
       	//$this->savetasktable($task_code,$ac_code);  		 	
		echo '<script language="javascript">';
        echo 'alert("merged successfully!!! ")';
        echo '</script>';
        $this->load->view("others");
		
    }
    public function savemergee() {
		
	  	$task_code= $_POST['task_code'];         	
	    $ac_code= $_POST['ac_code']; 		 
		$active= $_POST['active'];
		$startingdate= $_POST['startingdate'];
		$targetdate= $_POST['targetdate'];
 	    $duedate= $_POST['duedate'];
		$emp_code = $this->session->userdata('emp_code');
        if ($active==1)
			{		
			    $this->db->where('task_code', $task_code);
				$this->db->where('ac_code', $ac_code);
                $query = $this->db->get("trntask2");
                if ($query->num_rows()== 0) 
				   {		     
			    
			        $strSQL = "INSERT INTO trntask2 ";			
                    $strSQL .="(task_code,ac_code,followupassignto) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$task_code.",'".$ac_code."','".$emp_code."') ";
				    $this->db->query($strSQL);
					$id = $this->db->insert_id();
					
					$startingdate = substr($startingdate, 6, 4).'-'.substr($startingdate,3, 2).'-'.substr($startingdate,0, 2);
					$targetdate = substr($targetdate, 6, 4).'-'.substr($targetdate,3, 2).'-'.substr($targetdate,0, 2);
					$duedate = substr($duedate, 6, 4).'-'.substr($duedate,3, 2).'-'.substr($duedate,0, 2);
					 
				
		            $strSQL = "INSERT INTO trntask3 ";			
                    $strSQL .="(task_code,id,startingdate,targetdate,duedate) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$task_code."','".$id."','".$startingdate."','".$targetdate."','".$duedate."') ";	          
			        $this->db->query($strSQL);		
		          
					
				  }
					else if ($query->num_rows()> 0) 
						
					   {   
					      echo "Link already done for ".$task_code." ->".$ac_code." ";
					   }
            }
             else if ($active==0)
			{
				$strSQL = "delete from trntask2 where task_code=".$task_code." and ac_code=".$ac_code." ";
				$this->db->query($strSQL);
                
                $strSQL = "delete from trntask2 where task_code=".$task_code." and ac_code=".$ac_code." ";
				$this->db->query($strSQL);               				
            }					
			 	
		 	 	
		echo '<script language="javascript">';
        echo 'alert("merged successfully!!! ")';
        echo '</script>';
        $this->load->view("otherss");
		
    }
	public function savetasktable($task_code,$ac_code)

	{  	  
     
                $strSQL = "INSERT INTO trntask2 ";			
                $strSQL .="(task_code,ac_code) ";
                $strSQL .="VALUES ";
                $strSQL .="(".$task_code.",'".$ac_code."') ";	          
			    $this->db->query($strSQL);	

		
	}
	

	
	 
	 		
	
	}
 
?>