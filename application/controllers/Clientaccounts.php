 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientaccounts extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
         parent::__construct();
		 if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        $this->load->helper('url');
        $this->load->library('pagination');		
	    $this->load->library('Ajax_pagination');
        $this->perPage = 3;
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
        
    }	 
	 function get_books($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from accmasaccounts where ac_name like '%$st%' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_books_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from accmasaccounts where ac_name like '%$st%'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
	
	 function search()
    {
        // get search string
        $search = ($this->input->post("ac_name"))? $this->input->post("ac_name") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // pagination settings
        $config = array();
        $config["base_url"] = base_url() . "client/index";
        $config["total_rows"] = $this->record_count();
        $config['per_page'] = "100";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['pageno'] =$page+1;
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // get books list
        $data['results'] = $this->get_books($config['per_page'], $page, $search);
      //  $data["results"] = $this->masaccounts($config["per_page"], $page, $search);
        $data['links'] = $this->pagination->create_links();

        //load view
        $this->load->view('accounts/alterclient',$data);
    }
	 
   public function index() {
        $config = array();
        $config["base_url"] = base_url() . "client/index";
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
		
		$data['pageno'] =$page+1;
		 
        $config['attributes'] = array('class' => 'page-link');
        $data["results"] = $this->masaccounts($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("accounts/alterclient", $data);
    }
	
	 public function newclient()
	{
        	   
	    $data['ac_name']='';
		$data['address']='';
		$data['email']= '';
		$data['contactno']='';
		$data['contactperson']= '';
        $data['tin_no']= '33';
		$data['gst']= '';
		$data['pan']='';
		$data['gstid']= '';
		$data['gstpwd']= '';
		$data['itpwd']= '';
		$data['tdspwd']='';
		$data['iec']= '';		
		$data['ac_code']= '0'; 
		$data['treacespwd']= ''; 
		$data['tanno']= ''; 
		
		//$data['reg_date']= $current_date=date("d-m-Y"); 
		$data['reg_date']= 'Date'; 
		$data['entityname']= 'Select'; $data['groupname']= 'Select'; 
		$data['flag']= 'ADD'; 
		$this->load->view('accounts/editclient',$data);	
	}
	
	public function record_count() 
	{
		
        return $this->db->count_all("accmasaccounts");
    }
	
	public function gstid() 
	{
        $data='';
        $this->load->view("gstid",$data);
    }
	 function get_bookss($st = 0)
    {
        if ($st == "0") $st = "0";
		$branch_code=$this->session->userdata('branchcode');
       // $this->db->where('group_code', $branch_code);		//based on accmasaccounts not on masemp
        $sql = "select * from accmasaccounts where ac_code='$st' and group_code='$branch_code' ";
        $query = $this->db->query($sql);
        return $query->result();
    }
	function gstidsearch()
    {
        
        $search = ($this->input->post("ac_name"))? $this->input->post("ac_name") : "0";
		$data['results'] = $this->get_bookss($search);
		$this->load->view('gstid',$data);
	}
	
	public function masaccounts($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('ac_name');
        $query = $this->db->get("accmasaccounts");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
	 public function saveclient()
	{
        $flag= $this->input->post('flag');	
		$ac_name= $this->input->post('ac_name');
		
        $address= $this->input->post('address');	
        $pan= $this->input->post('pan');
		
		$selopnbal =$this->input->post('selopnbal');
		$opn_bal= $this->input->post('opnbal');
		if ($selopnbal=="dr"){$opn_bal=-$opn_bal;}
		//echo  ' '.$opn_bal;
 		
        $contactperson= $this->input->post('contactperson');		
        $contactno= $this->input->post('contactno');	
    		
		//$itpwd= $this->input->post('itpwd');		
		$gst= $this->input->post('gst');
		$gstsate= $this->input->post('gstsate');
		$gststatename= $this->input->post('gststatename');
	 
		
       // $gstid= $this->input->post('gstid');		
		//$gstpwd= $this->input->post('gstpwd');	
		 $tin_no= $this->input->post('tin_no');	
		
		//$tdspwd= $this->input->post('tdspwd');		
        $iec= $this->input->post('iec');	
		$email= $this->input->post('email');
        $reg_date= $this->input->post('reg_date');	
        $reg_date = substr($reg_date, 6, 4).'-'.substr($reg_date,3, 2).'-'.substr($reg_date,0, 2);		
		
		//$treacespwd= $this->input->post('treacespwd');	
        $tanno= $this->input->post('tanno');
		
		$groupname= $this->input->post('groupname');
		$this->db->where('groupname', $groupname);	     
		$datauser= $this->db->get('accmasgroup');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $group_code= $data['cmasjob']->group_code;
		
		$entityname= $this->input->post('entityname');
		$this->db->where('entityname', $entityname);	     
		$datauser= $this->db->get('masentity');
        foreach ($datauser->result() as $data['cmasjob']){};
	    $entity_code= $data['cmasjob']->entity_code;
		if (strcasecmp( $flag, 'ADD' ) == 0 )
		{
			
			$ac_code = 0;			
            $row = $this->db->query('SELECT MAX(ac_code) AS `maxid` FROM `accmasaccounts`')->row();
            if ($row)
			   {
				   if ($ac_name)
				   {
                    $ac_code = $row->maxid+1; 
				 
				    $strSQL = "INSERT INTO accmasaccounts ";			
                    $strSQL .="(ac_code,ac_name) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$ac_code.",'".$ac_name."') ";	          
			        $this->db->query($strSQL);		  
				   }
				  }             
        }
		else if (strcasecmp( $flag, 'EDIT' ) == 0 )
		{
			$ac_code=$this->uri->segment(3); 		  
            
        }
		
		  $strSQL ="update accmasaccounts set ac_name='".$ac_name."',address='".$address."',
			        tin_no='".$tin_no."',contactperson='".$contactperson."',opn_bal='".$opn_bal."',
				    contactno='".$contactno."',gstid='".$gstid."',
					iec='".$iec."',entity_code='".$entity_code."',
					gstsate='".$gstsate."',gststatename='".$gststatename."',
					email='".$email."',reg_date='".$reg_date."',group_code='".$group_code."',
					tanno='".$tanno."'
			        where ac_code='".$ac_code."'";
	        $this->db->query($strSQL);  
			
	$flag= $this->input->post('subjob');  
	
    $strSQL = "delete from  massetupjob where ac_code='".$ac_code."'";			
    $this->db->query($strSQL);	
	
	foreach($flag as $value)
    {
       $strSQL = "INSERT INTO massetupjob ";			
                    $strSQL .="(ac_code,subjob_code) ";
                    $strSQL .="VALUES ";
                    $strSQL .="(".$ac_code.",'".$value."') ";	          
			        $this->db->query($strSQL);	
    }
	
	 $this->index();	
	          
        
		
	}
	
	public function check_availability()
	{
		 if(!empty($_POST["username"]))
     	{
		$flag=$_POST["username"];
        $ac_name=$_POST["ac_name"];	
		
		  $tin_no=$_POST["tin_no"];				
		//$row = $this->db->query("SELECT  state_code  FROM stategst WHERE  tin_number='" . $tin_no. "'  ")->row();
		//if($row) {
		//	    $tin_no=$row->tin_no;				 
		//}
		//else {$tin_no=0;}
		
       		
		$row = $this->db->query("SELECT  pan,tin_no,ac_name FROM accmasaccounts WHERE  pan='" . $flag. "' and 
     		ac_name<>'" . $ac_name. "'and tin_no='" . $tin_no. "' ")->row();
		//echo $row->ac_name;
        if($row) {
			//This pan linked with [client name] [ state]
				 echo "<span style='color:red;font-weight:bold' class='status-available'> This pan linked with [$row->ac_name],  State   [row->tin_no]</span>";
				 
		}
		else
			
			{
		  	 echo "<span style='font-family: wingdings; font-size: 200%;'>&#252;</span>";
			}
		}		
	}
 
	public function editclient() {	
	    $ac_code=$this->uri->segment(3); 
	    $this->db->where('ac_code', $ac_code);
		$datauser= $this->db->get('accmasaccounts');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['ac_name']= $data['cuser']->ac_name;
		$data['address']= $data['cuser']->address;
		$data['email']= $data['cuser']->email;
		$data['contactno']= $data['cuser']->contactno;
		$data['contactperson']= $data['cuser']->contactperson;
		$data['tin_no']= $data['cuser']->tin_no;
		$data['gst']= $data['cuser']->gst;
		$data['gststate']= $data['cuser']->gststate;
		$data['gststatename']= $data['cuser']->gststatename;
		
		$data['opn_bal']= $data['cuser']->opn_bal;
		
		$data['tanno']= $data['cuser']->tanno;
		$data['treacespwd']= $data['cuser']->treacespwd;
		
		$data['gstid']= $data['cuser']->gstid;
		$data['pan']= $data['cuser']->pan;
		$data['gstpwd']= $data['cuser']->gstpwd;
		$data['itpwd']= $data['cuser']->itpwd;
		$data['tdspwd']= $data['cuser']->tdspwd;
		$data['iec']= $data['cuser']->iec;
		$data['reg_date']= date("d-m-Y", strtotime($data['cuser']->reg_date) ); 
		
		$entity_code=$data['cuser']->entity_code;
		$this->db->where('entity_code', $entity_code);	     
		$datauser= $this->db->get('masentity');	
	    foreach ($datauser->result() as $data['cmasjob']){};
		$data['entityname']=$data['cmasjob']->entityname;
		
		$group_code=$data['cuser']->group_code;
		$this->db->where('group_code', $group_code);	     
		$datauser= $this->db->get('accmasgroup');	
	    foreach ($datauser->result() as $data['cmasjob']){};
		$data['groupname']=$data['cmasjob']->groupname;
		
		$data['ac_code']= $this->uri->segment(3); 
		$data['flag']= 'EDIT'; 
		$this->load->view('accounts/editclient',$data);	
        
    }
	private function stripHTMLtags($str)
{
    $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
    $t = htmlentities($t, ENT_QUOTES, "UTF-8");
    return $t;
}
	public function saveremarks()

	{
        $id=$_POST["id"];
		$column=$_POST["column"];	
         $str= $this->stripHTMLtags($_POST["editval"]);		
        $strSQL ="update accmasaccounts set $column='".$str."'    where ac_code='".$id."'";						  
	    $this->db->query($strSQL);  
    
	}
	}