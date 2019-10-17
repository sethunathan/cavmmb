<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nrtask extends CI_Controller {
	function __construct()
    {
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
        $config["base_url"] = base_url() . "nrtask/index";
        $config["total_rows"] = $this->record_count();
        $config["per_page"] = 100;
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

        $this->load->view("nrtaskalter", $data);
    }
	 public function newtask()
	{ 
		$data['task_code']= ''; 		 
		$data['starting_date']=date("Y-m-d"); ; 
        $data['ending_date']= 'Date'; 
        $data['target_date']= 'Date'; 					
		$data['subjob_code']= 'Select'; 
		$data['ac_code']= 'Select'; 
		$data['flag']= 'ADD'; 
		$this->load->view('nrtaskedit',$data);	
	}
	
	public function record_count() 
	{
		return $this->db->count_all("trntask1");
    }
	
	public function masaccounts($limit, $start) {
		
        $this->db->limit($limit, $start);
		$this->db->order_by('trntask1.task_code','desc');
		 
        $this->db->where('job_code',5);		
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code');
		$this->db->join('trntask2', 'trntask1.task_code = trntask2.task_code');
		$this->db->join('accmasaccounts', 'trntask2.ac_code = accmasaccounts.ac_code');
        $query = $this->db->get("trntask1");

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

        $sac= $this->input->post('sac');	
        $taxper= $this->input->post('taxper');
        $amount= $this->input->post('amount');
               
		$task_name= $this->input->post('task_name');
        $starting_date= $this->input->post('starting_date');	
       
	    //$starting_date = substr($starting_date, 6, 4).'-'.substr($starting_date,3, 2).'-'.substr($starting_date,0, 2);		
		 
		$ending_date= $this->input->post('ending_date');	
        $ending_date = substr($ending_date, 6, 4).'-'.substr($ending_date,3, 2).'-'.substr($ending_date,0, 2);	
		
		$target_date= $this->input->post('target_date');	
        $target_date = substr($target_date, 6, 4).'-'.substr($target_date,3, 2).'-'.substr($target_date,0, 2);	
		
	    $subjob_code= $this->input->post('subjob_code');
		$ac_code= $this->input->post('ac_code');
		
		$emp_code = $this->session->userdata('emp_code');  
		$strSQL ="update massubjob set sac='".$sac."',taxper='".$taxper."',amount='".$amount."'   where subjob_code='".$subjob_code."'";
	    $this->db->query($strSQL);  

		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$task_code = 0;			
            $row = $this->db->query('SELECT MAX(task_code) AS `maxid` FROM `trntask1`')->row();
            if ($row)
			   {
				   //if ($task_name)
				   //{
                    $task_code = $row->maxid+1; 
					$task_namee='';
					$row = $this->db->query("SELECT subjobname FROM massubjob where subjob_code=$subjob_code")->row();
                    if ($row)
			        {
                        $task_namee = $row->subjobname; 
			        }
					
				    $task_name=$task_namee."-".$task_code;
					
				    $strSQL = "INSERT INTO trntask1 ";			
                    $strSQL .="(task_code,task_name) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$task_code.",'".$task_name."') ";	          
			        $this->db->query($strSQL);		
                     
			        $orderr = 0;			
                    $row = $this->db->query("SELECT MAX(entryandverfiorder) AS maxid FROM trntask2
         			       where entryassisgnedto=$emp_code")->row();
                      if ($row)
			           {
                        $orderr = $row->maxid+1; 
			           }			
                    $current_datetime=date("d-m-Y H:i:s"); 
					$strSQL = "INSERT INTO trntask2 ";			
                    $strSQL .="(task_code,ac_code,entryandverfiorder,followupassignto,followupdoneby,followupdoneat,entryassisgnedto,movetotask) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$task_code.",'".$ac_code."','".$orderr."','".$emp_code."','".$emp_code."','".$current_datetime."','".$emp_code."','1') ";	          
			        $strSQL;
					 
					 $this->db->query($strSQL);
				   //}
				  }  				  
        }
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$task_code=$this->uri->segment(3); 	
        }
		//task_name='".$task_name."',
		   $strSQL ="update trntask1 set  subjob_code='".$subjob_code."',
				starting_date='".$starting_date."',ending_date='".$ending_date."',target_date='".$target_date."'
			    where task_code='".$task_code."'";
	     $this->db->query($strSQL);
	    redirect('nrtask', 'refresh');
		
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
	    $this->db->where('trntask1.task_code', $task_code);
		$this->db->join('trntask2', 'trntask1.task_code = trntask2.task_code');
		$datauser= $this->db->get('trntask1');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['task_name']= $data['cuser']->task_name;
		$data['ac_code']= $data['cuser']->ac_code;
	 
		$data['starting_date']= date("Y-m-d", strtotime($data['cuser']->starting_date) ); 
		$data['ending_date']= date("d-m-Y", strtotime($data['cuser']->ending_date) ); 
		$data['target_date']= date("d-m-Y", strtotime($data['cuser']->target_date) ); 
		
		$subjob_code=$data['cuser']->subjob_code;
		$this->db->where('subjob_code', $subjob_code);	     
		$datauser= $this->db->get('massubjob');	
	    foreach ($datauser->result() as $data['cmasjob']){};
		$data['subjobname']=$data['cmasjob']->subjobname;
		$data['subjob_code']=$subjob_code;
		$data['sac']=$data['cmasjob']->sac;
		$data['taxper']=$data['cmasjob']->taxper;
		$data['amount']=$data['cmasjob']->amount;		
		$data['task_code']= $this->uri->segment(3); 
		$data['flag']= 'EDIT'; 
		$this->load->view('nrtaskedit',$data);	
        
    }
	
	}