<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
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
		date_default_timezone_set('Asia/Kolkata');
        
    }
	
	public function index() {
		date_default_timezone_set('Asia/Kolkata');
        $config = array();
        $config["base_url"] = base_url() . "job/index";
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
        $data["results"] = $this->massubjob($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("jobalter", $data);
    }
	public function jobedit() {	
	    $ac_code=$this->uri->segment(3); 
	    $this->db->where('subjob_code', $ac_code);
		$datauser= $this->db->get('massubjob');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['addsubjobname']= $data['cuser']->subjobname;
		$data['addjobcode']= $data['cuser']->job_code; 
		$data['addactive']= $data['cuser']->activee;
	    $data['addrepeat']= $data['cuser']->repeatt;
		
		$data['addsac']= $data['cuser']->sac;
		$data['addtaxper']= $data['cuser']->taxper;
		$data['addamount']= $data['cuser']->amount;
		$data['addtds']= $data['cuser']->tds;
		
		
		
		$data['flag']= 'EDIT'; 			 	 
		$data['subjob_code']= $this->uri->segment(3); 		 
		$this->load->view('jobedit',$data);	
        
    }
	public function massubjob($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('subjobname');
        $query = $this->db->get("massubjob");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function record_count() 
	{
		
        return $this->db->count_all("massubjob");
    }
	public function getjob()
	{	  
	     $this->db->select('jobname,job_code');  
          $this->db->order_by('jobname');		 
		//$this->db->where('starid', $starid);
		$this->db->from('masjob');		
		$query=$this->db->get();
		 $row_array = $query->result_array();
		 $subjob_code = $_POST["subjob_code"];	
		 echo  "<select name='yourSelect_$subjob_code'   id='yourSelect_$subjob_code'>";
				
      
       $row = $this->db->query("SELECT job_code  FROM massubjob where  subjob_code=  '".$subjob_code."'")->row();
        if ($row)
			{
			    echo $job_code = $row->job_code; 
		    }
		 
	    foreach ($query->result_array() as $client)
		    {
			 
			 if ($client['job_code']== $job_code) { 
			 $job_codee= $job_code;
			  echo "<option value=".$client['job_code']." selected = 'selected'>".$client['jobname']."</option>";
			 }
			 else{
				  echo "<option value=".$client['job_code']." >".$client['jobname']."</option>";
			 }
			  
			}
			echo  "</select>";
			
		 }

	public function jobnew()
	{
        $data['flag']= 'ADD'; 	   
	    $data['addsubjobname']='';
		$data['subjob_code']='';
		
		$data['addactive']='1';
		$data['addrepeat']='1';
		
		$data['addjobcode']='3';

        $data['addsac']='998221';
        $data['addamount']='200'; 
        $data['addtaxper']='18';	
		
		$this->load->view('jobedit',$data);	
	}
	
	public function gettablesubjob()
	{
		$period_code=$_POST["periodcode"];
		//$period_code=2;
		$str='';
		$periodlength=0;
		$row = $this->db->query("SELECT  periodlength FROM masperiod WHERE  period_code='" . $period_code . "'")->row();
        if ($row)
			{
			 
             $periodlength = $row->periodlength; 
				      
			}  
		$str ='<table class="mytable" id="mytable">';	
		for($i=0;$i<$periodlength;$i++)
		{		
		    $str = $str.'<tr><td><input type="text" 
             		class="daterange" value="01/01/2017"   name="daterange1[]" ></input>';
            $str =$str.'<input type="text"   value="01/01/2017" class="daterange"   name="daterange2[]"  ></input> </td>';
	        $str =$str.' <td><input type="text"  value="01/01/2017"  class="daterange"   name="singledate[]"  ></input> ';
            $str =$str. '</td></tr>';
		}	
		$str =$str. '</table>';
        echo $str;		  
	}
	public function subjoball()
	{  
	     $action = $_POST["action"]; 
	     $subjobname=$_POST["subjobname"];	
         $jobcode=$_POST["jobcode"];		 
         $subjobcode=$_POST["subjobcode"];	
         
		 $active=$_POST["active"];		 
		 $repeat=$_POST["repeat"];
         $tds=$_POST["tds"];			 
		 
		 
		 $addsac=$_POST["addsac"];		 
		 $addtaxper=$_POST["addtaxper"];
         $addamount=$_POST["addamount"];			 
		  
		$editsubjobname=''; $editsubjobcode=''; $editjobcode='';
	 
		 
        if(!empty($action)) {
			
           	switch($action) {					 
		        case "ADD":	             
			    	$subjobcode = 1;	            
                    $row = $this->db->query('SELECT MAX(subjob_code) AS maxid FROM massubjob')->row();
                   if ($row)
			          {
			         if ($subjobname)
				        {
                         $subjobcode = $row->maxid+1; 
				        }
	 
			 $row = $this->db->query("SELECT  subjobname FROM massubjob WHERE  subjobname='" . $subjobname. "'")->row();
        if ($row)
			{
			 
               
				      
			}
			else{
				  $sql = "INSERT INTO massubjob (subjobname,subjob_code,activee,repeatt,sac,taxper,tds,amount,job_code
				  ) VALUES ('" . $subjobname . "',
				  '" . $subjobcode . "',
				  '" . $active . "',
				  '" . $repeat . "',
				  '" . $addsac . "',
				  '" . $addtaxper . "',
				  '" . $tds . "',
				  '" . $addamount . "',
				  '" . $jobcode . "')";
				  $result =$this->db->query($sql);	
				  
		    }		  
				  
				  
			}     break;
		        case "EDIT":
				    $addd = 1;
			break;			
		
		case "delete": 
		    $addd = 1;
			//if(!empty($_POST["subjob_code"])) {
				//  $sql="DELETE FROM masubsjob WHERE  subjob_code=".$subjobcode;
				 // $result =$this->db->query($sql);
				
			//}
			break;
	     }
 
 		/////////////////////////////////////////////////////////////////////////////// 
        $sql="UPDATE massubjob set subjobname = '$subjobname',
		job_code = '$jobcode',activee = '$active',repeatt = '$repeat',sac = '$addsac',taxper = '$addtaxper',
		tds = '$tds',
		amount = '$addamount'
		WHERE  subjob_code=".$subjobcode; 			
		$result =$this->db->query($sql);
       echo  "Date Saved Scucessfully";

 
	     
	/////////////////////////////////////////////////////////////////////////////// 	 
		 
       }
	}
	
	public function insertsubjob($subjobname,$details)
	{
			
		$subjob_code = 1;			
        $row = $this->db->query('SELECT MAX(subjob_code) AS maxid FROM massubjob')->row();
        if ($row)
			{
			  if ($subjobname)
				{
                    $subjob_code = $row->maxid+1; 
				}
			}
        $job_code = 0;	
		 $sql = "SELECT job_code  FROM masjob where  jobname=  '".$details."'";
        $row = $this->db->query("SELECT job_code  FROM masjob where  jobname=  '".$details."'")->row();
        if ($row)
			{
			  if ($details)
				{
                    $job_code = $row->job_code; 
				}
			}
			 
		 $sql = "INSERT INTO massubjob (subjobname,subjob_code,job_code,details) VALUES ('" . $subjobname . "','" . $subjob_code . "','" . $job_code . "','" . $details . "')";
	   
	 $this->db->query($sql);
       
		return '<div class="message-box"  id="message_' . $subjob_code . '">
						<div>
						<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $subjob_code . ')">Edit</button>
                     <button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $subjob_code . ')">Delete</button>
						</div>
						<div class="message-content">' . $_POST["addsubjobname"] . '</div></div>';
	     

	}
	
	public function joball()
	{
	    $action = $_POST["action"];
        if(!empty($action)) {
           	switch($action) {					 
		        case "add":			
                    echo  $retstr=$this->insertjob($_POST["addjobname"],$_POST["details"]);		
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
	public function insertjob($jobname,$details)
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
		return '<div class="message-box"  id="message_'. $job_code . '">
						<div>
						<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $job_code . ')">Edit</button>
                     <button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $job_code . ')">Delete</button>
						</div>
						<div class="message-content">' . $_POST["addjobname"] . '</div></div>';
	     

	}
	
	 
	 		
	
	}
 
?>