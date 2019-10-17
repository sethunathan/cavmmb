<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {
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

	{	$this->db->order_by('checklist_code');
	    $data['client'] = $this->db->get('maschecklist')->result_array();
        $this->load->view('checklist',$data);	
	}
	
	public function checklistall()
	{
	    $action = $_POST["action"];
        if(!empty($action)) {
           	switch($action) {					 
		        case "add":			
                    echo  $retstr=$this->insertchecklist($_POST["addchecklistname"],$_POST["details"]);		
			        break;
		        case "edit":
				    $sql="UPDATE maschecklist set checklistname = '".$_POST["checklistname"]."' WHERE  checklist_code=".$_POST["checklist_code"];
				    
					$result =$this->db->query($sql);
			       
					if($result){
				        echo $_POST["checklistname"];
			        }
			break;			
		
		case "delete": 
			if(!empty($_POST["checklist_code"])) {
				  $sql="DELETE FROM maschecklist WHERE  checklist_code=".$_POST["checklist_code"];
				  $result =$this->db->query($sql);
				
			}
			break;
	     }
       }
	}
	public function insertchecklist($checklistname,$details)
	{
			
		$checklist_code = 1;			
        $row = $this->db->query('SELECT MAX(checklist_code) AS `maxid` FROM `maschecklist`')->row();
        if ($row)
			{
			  if ($checklistname)
				{
                    $checklist_code = $row->maxid+1; 
				}
			}	
		$sql = "INSERT INTO maschecklist (checklistname,checklist_code,details) VALUES ('" . $checklistname . "','" . $checklist_code . "','" . $details . "')";
	    $this->db->query($sql);	
		return '<div class="message-box"  id="message_' . $checklist_code . '">
						<div>
						<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $checklist_code . ')">Edit</button>
                     <button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $checklist_code . ')">Delete</button>
						</div>
						<div class="message-content">' . $_POST["addchecklistname"] . '</div></div>';
	     

	}
	
	 
	 		
	
	}
 
?>