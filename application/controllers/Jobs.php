<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
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

	{	$this->db->order_by('job_code');
	    $data['client'] = $this->db->get('masjob')->result_array();
        $this->load->view('jobs',$data);	
	}
	
	public function checklistall()
	{
	    $action = $_POST["action"];
        if(!empty($action)) {
           	switch($action) {					 
		        case "add":			
                    echo  $retstr=$this->insertchecklist($_POST["addjobname"],$_POST["details"]);		
			        break;
		        case "edit":
				    $sql="UPDATE masjob set jobname = '".$_POST["jobname"]."' WHERE  job_code=".$_POST["job_code"];
				    
					$result =$this->db->query($sql);
			       
					if($result){
				        echo $_POST["jobname"];
			        }
			break;			
		
		case "delete": 
			if(!empty($_POST["job_code"])) {
				  $sql="DELETE FROM masjob WHERE  job_code=".$_POST["job_code"];
				  $result =$this->db->query($sql);
				
			}
			break;
	     }
       }
	}
	public function insertchecklist($jobname,$details)
	{
			
		$job_code = 1;			
        $row = $this->db->query('SELECT MAX(job_code) AS `maxid` FROM `masjob`')->row();
        if ($row)
			{
			  if ($jobname)
				{
                    $job_code = $row->maxid+1; 
				}
			}	
		$sql = "INSERT INTO masjob (jobname,job_code,details) VALUES ('" . $jobname . "','" . $job_code . "','" . $details . "')";
	    $this->db->query($sql);	
		return '<div class="message-box"  id="message_' . $job_code . '">
						<div>
						<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $job_code . ')">Edit</button>
                     <button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $job_code . ')">Delete</button>
						</div>
						<div class="message-content">' . $_POST["addjobname"] . '</div></div>';
	     

	}
	
	 
	 		
	
	}
 
?>