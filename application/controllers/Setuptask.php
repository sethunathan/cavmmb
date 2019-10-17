<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setuptask extends CI_Controller {
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
        
    }
	  public function index() {       
        $data['task_name']='';		 
		$data['task_code']= '0'; 		 
		$data['starting_date']= 'Date'; 
        $data['ending_date']= 'Date'; 
        $data['target_date']= 'Date'; 					
		$data['subjobname']= 'Select'; 
		$data['flag']= 'ADD'; 
        $this->load->view("setuptask", $data);
    }
	 public function savetask()
	{		
	   $chkPassPort= $this->input->post('chkPassPort');$i=1;
	    $this->input->post("txtmessage_$i");
	   for($i=1;$i<=$chkPassPort;$i++)
	   {
		    $task_name=$this->input->post("txtmessage_$i");
			$starting_date=$this->input->post("txtstdate_$i");
			$ending_date=$this->input->post("txtendtdate_$i");
			$target_date=$this->input->post("txtduetdate_$i");
			$servicename=$this->input->post("subjobname");
			$flagg=$this->input->post('acname'); 
			
			$this->savetasktable($task_name,$starting_date,$ending_date,$target_date,$servicename,$flagg);
			echo '<script language="javascript">';
            echo "alert(' $task_name inserted successfully!!! ')";
            echo '</script>';
	   }
	    $data['task_name']='';		 
		$data['task_code']= '0'; 		 
		$data['starting_date']= 'Date'; 
        $data['ending_date']= 'Date'; 
        $data['target_date']= 'Date'; 					
		$data['subjobname']= 'Select'; 
		$data['flag']= 'ADD'; 
        $this->load->view("setuptask", $data);
	} 
	//delete  from `trntask1` where task_code=26;

//delete  from `trntask2` where task_code=26;

//delete  from `trntask2` where task_code=27;
//delete  from `trntask1` where task_code=27;

	public function savetasktable($task_name,$starting_date,$ending_date,$target_date,$servicename,$flagg)

	{ 
        $flag=" ADD";				
        $starting_date = substr($starting_date, 6, 4).'-'.substr($starting_date,3, 2).'-'.substr($starting_date,0, 2);
        $ending_date = substr($ending_date, 6, 4).'-'.substr($ending_date,3, 2).'-'.substr($ending_date,0, 2);
        $target_date = substr($target_date, 6, 4).'-'.substr($target_date,3, 2).'-'.substr($target_date,0, 2);	
		$task_code =0;		
		$this->db->where('subjobname', $servicename);	     
		$datauser= $this->db->get('massubjob');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $subjob_code= $data['cmasjob']->subjob_code;
		$strSQL='';
		 
		
		$task_code = 0;			
        $row = $this->db->query('SELECT MAX(task_code) AS `maxid` FROM `trntask1`')->row();
		 
	
        if ($row)
			   {
				   if ($task_name)
				{
                    $task_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO trntask1 ";			
                    $strSQL .="(task_code,task_name) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$task_code.",'".$task_name."') ";	          
			        $this->db->query($strSQL);		  
				}
			 }
          	  
        	$flagg= $this->input->post('acname'); //$flagg= $this->input->post('acname')				 
	        foreach($flagg as $value)
            {
                $strSQL = "INSERT INTO trntask2 ";			
                $strSQL .="(task_code,ac_code) ";
                $strSQL .="VALUES ";
                $strSQL .="(".$task_code.",'".$value."') ";	          
			    $this->db->query($strSQL);	
				//echo $strSQL;
             }  
       
		 
		
		$strSQL ="update trntask1 set task_name='".$task_name."',subjob_code='".$subjob_code."',
					starting_date='".$starting_date."',ending_date='".$ending_date."',target_date='".$target_date."'
			          where task_code='".$task_code."'";
	    $this->db->query($strSQL);
		
	}
	
	 public function newtask()
	{
        	   
	    $data['task_name']='';		 
		$data['task_code']= '0'; 		 
		$data['starting_date']= 'Date'; 
        $data['ending_date']= 'Date'; 
        $data['target_date']= 'Date'; 					
		$data['subjobname']= 'Select'; 
		$data['flag']= 'ADD'; 
		$this->load->view('setuptask',$data);	
	}
	
	public function record_count() 
	{
		
        return $this->db->count_all("trntask1");
    }
	
	public function masaccounts($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('task_name');
		//$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask1.ac_code');
        $query = $this->db->get("trntask1");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
	public function check_availability()
	{
		 if(!empty($_POST["username"]))
     	{
		$flag=$_POST["username"];
        $ac_name=$_POST["ac_name"];			
		$row = $this->db->query("SELECT  pan,ac_name FROM accmasaccounts WHERE  pan='" . $flag. "' and 
     		ac_name<>'" . $ac_name. "' ")->row();
		//echo $row->ac_name;
        if($row) {
				 echo "<span style='color:red;font-weight:bold' class='status-available'> PAN Taken For $row->ac_name</span>";
				 
		}
		else
			
			{
		  	 echo "<span style='font-family: wingdings; font-size: 200%;'>&#252;</span>";
			}
		}		
	}
 
	public function edittask() {	
	    $task_code=$this->uri->segment(3); 
	    $this->db->where('task_code', $task_code);
		$datauser= $this->db->get('trntask1');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['task_name']= $data['cuser']->task_name;
	 
		$data['starting_date']= date("d-m-Y", strtotime($data['cuser']->starting_date) ); 
		$data['ending_date']= date("d-m-Y", strtotime($data['cuser']->ending_date) ); 
		$data['target_date']= date("d-m-Y", strtotime($data['cuser']->target_date) ); 
		
		$subjob_code=$data['cuser']->subjob_code;
		$this->db->where('subjob_code', $subjob_code);	     
		$datauser= $this->db->get('massubjob');	
	    foreach ($datauser->result() as $data['cmasjob']){};
		$data['subjobname']=$data['cmasjob']->subjobname;
		
		 
		
		$data['task_code']= $this->uri->segment(3); 
		$data['flag']= 'EDIT'; 
		$this->load->view('setuptask',$data);	
        
    }
	
	}