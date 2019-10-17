<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ittask extends CI_Controller {
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
        $config = array();
        $config["base_url"] = base_url() . "ittask/index";
        $config["total_rows"] = $this->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        $data["results"] = $this->masaccounts($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("ittaskalter", $data);
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
		$this->load->view('taskedit',$data);	
	}
	
	public function record_count() 
	{
		
        return $this->db->count_all("trnittask1");
    }
	
	public function masaccounts($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('task_name');
		//$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnittask1.ac_code');
        $query = $this->db->get("trnittask1");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
	 public function savetask()

	{ 
        $flag= $this->input->post('flag');	
		$task_name= $this->input->post('task_name');
        $starting_date= $this->input->post('starting_date');	
        $starting_date = substr($starting_date, 6, 4).'-'.substr($starting_date,3, 2).'-'.substr($starting_date,0, 2);		
		 
		$ending_date= $this->input->post('ending_date');	
        $ending_date = substr($ending_date, 6, 4).'-'.substr($ending_date,3, 2).'-'.substr($ending_date,0, 2);	
		
		$target_date= $this->input->post('target_date');	
        $target_date = substr($target_date, 6, 4).'-'.substr($target_date,3, 2).'-'.substr($target_date,0, 2);	
		
		$servicename= $this->input->post('subjobname');
		$this->db->where('subjobname', $servicename);	     
		$datauser= $this->db->get('massubjob');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $subjob_code= $data['cmasjob']->subjob_code;
		
		 
		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$task_code = 0;			
            $row = $this->db->query('SELECT MAX(task_code) AS `maxid` FROM `trnittask1`')->row();
           if ($row)
			   {
				   if ($task_name)
				   {
                    $task_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO trnittask1 ";			
                    $strSQL .="(task_code,task_name) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$task_code.",'".$task_name."') ";	          
			        $this->db->query($strSQL);		  
				   }
				  }   


        	  $flagg= $this->input->post('acname'); 
			 
	        foreach($flagg as $value)
         {
            $strSQL = "INSERT INTO trnittask2 ";			
                    $strSQL .="(task_code,ac_code) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$task_code.",'".$value."') ";	          
			        $this->db->query($strSQL);	
             }
			 
				  
        }
		
		
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$task_code=$this->uri->segment(3); 		  
            
        }
		
		  $strSQL ="update trnittask1 set task_name='".$task_name."',subjob_code='".$subjob_code."',
					starting_date='".$starting_date."',ending_date='".$ending_date."',target_date='".$target_date."'
			          where task_code='".$task_code."'";
	        $this->db->query($strSQL); 
	       // $strSQL = "delete from  trnittask2 where task_code='".$task_code."'";			
           // $this->db->query($strSQL);	
			

	 redirect('task', 'refresh');
	          
        
		
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
		$datauser= $this->db->get('trnittask1');	
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
		$this->load->view('itaskedit',$data);	
        
    }
	
	}