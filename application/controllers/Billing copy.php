<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {
	function __construct()
    {
		//mid(bill_date,4,2)
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
    //  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->library('session');	  
        $this->load->helper('url');
	  
		
		
		date_default_timezone_set('Asia/Kolkata');
        
    }
	public function outstanding()
	{
		$date1=$this->input->post('datepicker1');
        $date2=$this->input->post('datepicker2');	
		$data['date1']=$date1; 
		$data['date2']=$date1;
	    $branch_code=$this->session->userdata('branchcode');
        $accode=0;
		$this->getclosbalall();			   
		 if (isset($_POST['ac_code']))
		{
            	   $data['ac_code'] =$_POST["ac_code"]; 
				   $accode =$_POST["ac_code"]; 
		}		
        else
        {		
           
		   $data['ac_code'] =-1;	
		}
		// $this->db->where('abs(clos_bal) >', 0);
        $this->db->where("clos_bal<>",0);		 
		//$this->db->where('ac_code', $accode);
		$this->db->where('group_code', $branch_code);
		$this->db->order_by('abs(clos_bal)','desc');
		$this->db->select('ac_code,tot_dr,tot_cr,ac_name,contactno,opn_bal,clos_bal');  
        $this->db->from('accmasaccounts'); 
	    $data['client']=$this->db->get()->result_array();;
        $this->load->view('billingos',$data);		
	}
	public function movetotask1()

	{ 
        $id=$_POST["id"];  
        $strSQL ="update trntask2 set billed=1   where id='".$id."'";
		$this->db->query($strSQL);   
	}
	public function saveremarks() 
	{
        $id=$_POST["id"]; 
        $strSQL ="update trntask2 set remarks='".$_POST["remarks"]."'    where id='".$id."'";	
	    $this->db->query($strSQL);      
	}	
	public function unbilled()
	{
	    
		//$this->getclosbalall();	
		$groupcode=7;
        $billed=1;
		 if (isset($_POST['accgroup']))
		{
			
			        $groupcode=$_POST["accgroup"]; 
					$billed=$_POST["billed"]; 
            	    $data['accgroup'] =$groupcode; 
					$data['billed'] =$billed; 
				 
			     
		}		
        else
        {		
           
		   $data['accgroup'] =-1;	
		   	$data['billed'] =$billed; 
		}
		//if ($groupcode=-1){}
		//else { $this->db->where('group_code',$groupcode );}
		$this->db->where('group_code',$groupcode );
		
		$this->db->order_by('ac_name,task_name');  	
		
		if ($billed==2)
		{
            $this->db->where('billed', 0);	
            $this->db->where('movetotask', 4);	
           			   
		}
		else if ($billed==1)
		{
           $this->db->where('billed', 1);	
           $this->db->where('movetotask<', 4);
             $this->db->where('free', 0);		   
		}
	    
		$this->db->select('billed,bill_no,comp_id,bill_date,movetotask,empname,abs(clos_bal) as  closbal,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id   ');
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
        $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
		$this->db->join('trnbilling2', 'trnbilling2.id = trntask2.id','left');
        $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');
        $this->db->join('masemp', 'masemp.emp_code = trntask2.billingmoveby','left');		
	    $data['client'] = $this->db->get('trntask2')->result_array();  
        $this->load->view('unbilled',$data);		
	}
	public function getmaxacc()
	{
		$billno = 0;$yearid = 2;
		$row = $this->db->query("SELECT MAX(bill_no) AS `maxid` FROM trnbilling1 where comp_id=1 and yearid=$yearid")->row();
		echo $billno = $row->maxid+1; 
	}
	public function modifybillshort()
	{
			
		if(!empty($_POST["monthn"])) 
		 {  
 		  //  $billmonth=$_POST["monthn"];		   
		}
        else { $billmonth=date('n');} 
	     
		//$this->db->where('MONTH(bill_date)',  $billmonth);
		//$this->db->where('MONTH(bill_date)',  date($billmonth));
		$this->db->order_by('trnbilling1.bill_no,trnbilling1.bill_date');
		$this->db->where('trnbilling1.typee', 1); 
	    $this->db->select('trnbilling1.vch_no,trnbilling1.bill_no,trnbilling1.pty_code,ac_name,netval,remarks,trnbilling1.bill_date,trnbilling1.comp_id,yearid');  
        $this->db->from('trnbilling1');
		$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.pty_code');
	    $data['records']=$this->db->get();	
		$data['monthn']=$billmonth;	
	 	$this->load->view('createbillshort',$data); 
	}
	public function modifybill()
	{
		$billmonth=$_POST["monthn"];
		 
		
	     $date1=$_POST["datepicker1"];
		$date2=$_POST["datepicker2"];	
		
		 $dateone=substr($date1,6,4).substr($date1,3,2).substr($date1,0,2);
		 $datetwo=substr($date2,6,4).substr($date2,3,2).substr($date2,0,2);

		 $comp_id=$_POST["comp_idd"];	
			
		if(!empty($_POST["monthn"])) 
		 {  
 		     $billmonth=$_POST["monthn"];		   
		}
		else { $billmonth=date('n');
		} 
		 
		 $yearid=$_POST["yearidd"];
		 $this->db->where('billdatelong >=', $dateone);
         $this->db->where('billdatelong <=',$datetwo);
	   // $this->db->where('MONTH(billdatelong)',  $billmonth);
		$this->db->where('comp_id',  $comp_id);
		$this->db->order_by('bill_no,bill_date');
		$this->db->where('typee', 0); 
		//$this->db->where('yearid', $yearid);
	    $this->db->select('roundoff,vch_no,bill_no,pty_code,ac_name,netval,remarks,bill_date,comp_id,yearid,billnoprint');  
        $this->db->from('trnbilling1');
		$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.pty_code');
		$data['records']=$this->db->get();	
		print_r($this->db->last_query());
		$data['date1']=$billmonth;	
		$data['date1']=$date1;	$data['date2']=$date2;	
	 	$this->load->view('createbill',$data); 
	}
	public function newbill() {
		
		$ac_code= $_POST['ac_code'];
        $this->db->where('ac_code', $ac_code);
		$comp_id= $_POST['comp_id'];
		$yearid= $_POST['yearid'];;
		$this->db->select('ac_name,ac_code,address,contactno,email,gst ')  ;	   
	    $data['masaccounts'] = $this->db->get('accmasaccounts')->result_array();      

        $billno = 1;			
        $row = $this->db->query("SELECT MAX(bill_no) AS  maxid FROM trnbilling1 where comp_id=$comp_id and yearid=$yearid")->row();
        if ($row)
			{
				
                $billno = $row->maxid+1; 
				   
			}
        $data['billno']= $billno;
        $data['billdate']= date("d/m/Y") ; 			
		
        $this->db->where('comp_id', $comp_id);
		$this->db->select('company_name,comp_id,address1,address2,address3,mobileno,emailid,gstno ')  ;	   
	    $data['company'] = $this->db->get('mascompany')->result_array();      

		
	  	$accode= $_POST['accode'];
	    $data['accode'] = $accode;
		
        $this->db->order_by('trntask2.task_code,task_name');  	
        $this->db->where('billed', 0);		  		
		$this->db->where('accmasaccounts.ac_code', $accode);		  
		$this->db->select('task_name,ac_name,trntask2.ac_code,sac,taxper,amount,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id   ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
        $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
        $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');		
	    $data['client'] = $this->db->get('trntask2')->result_array();      

		
        $this->load->view("newbill",$data);
		
    }
	public function mex()
	{
	
		$this->load->view('createbill.php');	
		
	}
	public function createbillshort()
	{
		$this->load->view('createbillshort.php');	
		
	}
	public function createbill()
	{ 

        $this->load->view("createbill");
		 
	}
	 
	public function getopnbal($ac_code)	
	{  
        $opn_bal=0;		
        $row = $this->db->query("SELECT opn_bal from accmasaccounts where  ac_code=". $ac_code."")->row();
        if ($row)
			{
              $opn_bal= $row->opn_bal;
			}
		return $opn_bal;
	}
	
	public function getclosbal($ac_code)	
	{  
        $opn_bal=0;	$accamount=0;	
        $row = $this->db->query("SELECT opn_bal from accmasaccounts where  ac_code=". $ac_code."")->row();
        if ($row)
			{
              $opn_bal= $row->opn_bal;
			}
		
		$row = $this->db->query("SELECT sum(dr_amt) as dramount,sum(cr_amt) as cramount from accentry where  ac_code=". $ac_code."")->row();
        if ($row)
			{
              $accamount= $row->dramount+$row->cramount;
			} 
		return $accamount+$opn_bal;	
	}
	public function getclosbalall()	
	{  
        $opn_bal=0;	$accamount=0;	$ac_code=0;
		// $this->db->where('ac_code', 2);		 
        $this->db->select('ac_code,opn_bal');		
		$castxe= $this->db->get('accmasaccounts');
        		
		foreach($castxe->result() as $data)
		{
			$opn_bal= $data->opn_bal;$ac_code= $data->ac_code;
			$row = $this->db->query("SELECT sum(dr_amt) as dramount,sum(cr_amt) as cramount from accentry where  ac_code=". $ac_code."")->row();
            $dramount=0;$cramount=0;$accamount=0;
			if ($row)
			{
              $dramount= $row->dramount;$cramount= $row->cramount;
			   if ( (strlen($dramount) == 0) || ($dramount == '0') || ($dramount == 'null') )
			   {
				   $dramount=0;
			   }
			    if ( (strlen($cramount) == 0) || ($cramount == '0') || ($cramount == 'null') )
			   {
				   $cramount=0;
			   }
		         $accamount= ($dramount+$cramount)+$opn_bal; 
			} 
		    $this->db->query("update accmasaccounts set tot_cr=$cramount, tot_dr=$dramount, clos_bal=$accamount where  ac_code=". $ac_code."");	   
		} 
       
		
		
		return $accamount+$opn_bal;	
	}
	public function billprint()

	{	
	    $bill_no=$this->uri->segment(3);
        $comp_id=$this->uri->segment(4); 
		$pty_code=$this->uri->segment(5);  
		 $yearid=$this->uri->segment(6); 		
		
		$this->db->where('bill_no', $bill_no);
        $this->db->where('mascompany.comp_id', $comp_id); 		
             
		$data['opnbal']=$this->getopnbal($pty_code);	
		$data['closbal']=$this->getclosbal($pty_code);
		$this->db->where('yearid', $yearid);  
		
		$tinno=0;
		////////////////////////////////////////////
		$rowgst = $this->db->query("SELECT  tin_no FROM accmasaccounts where  ac_code=$pty_code")->row();
		        
		$tinno = $rowgst->tin_no;
		///////////////////////////////////////////
		$this->db->select('roundoff,bill_no,bill_date,remarks,yearid,billnoprint,taxamt,
		company_name,mascompany.address1,mascompany.address2,mascompany.mobileno,mascompany.address3,
		emailid,gstno,state,netval');	        
        $this->db->join('mascompany', 'mascompany.comp_id = trnbilling1.comp_id');			
	    $data['company'] = $this->db->get('trnbilling1')->result_array(); 

          
		$this->db->where('bill_no', $bill_no);
		$this->db->where('comp_id', $comp_id); 	
		$this->db->where('yearid', $yearid); 			
		$this->db->select('sum(sgst) as sumsgst,sum(rate) as sumrate,taxper,sum(totalamount) as sumtotalamount');
        $this->db->group_by('taxper'); 	    
	    $data['gstt'] = $this->db->get('trnbilling2')->result_array(); 
		 
		
		$this->db->where('bill_no', $bill_no); $this->db->where('comp_id', $comp_id); 	$this->db->where('yearid', $yearid); 		 	        
		$this->db->select('ac_name,gststate,gststatename,clos_bal,address,contactno,gst,email');	        
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.pty_code');			
	    $data['masaccounts'] = $this->db->get('trnbilling1')->result_array();
        
		$this->db->where('bill_no', $bill_no);
		$this->db->where('trnbilling1.comp_id', $comp_id); 
		$this->db->where('yearid', $yearid); 	
		$this->db->select('bank_name,bank_acno,ifsc');	        
        $this->db->join('masbank', 'masbank.comp_id = trnbilling1.comp_id');			
	    $data['masbank'] = $this->db->get('trnbilling1')->result_array();
		
		$this->db->where('trnbilling2.comp_id', $comp_id); 
		$this->db->where('yearid', $yearid); 
        $this->db->where('bill_no', $bill_no);  	        
		$this->db->select('cgst,sgst,gsttaxper,totalamount,trnbilling2.sac,rate,task_name,trnbilling2.amount,trnbilling2.taxper,
		trnbilling2.taxamt,trnbilling2.task_id,trnbilling2.id');
        $this->db->join('trntask1', 'trntask1.task_code = trnbilling2.task_id');		
        $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');			
	    $data['client'] = $this->db->get('trnbilling2')->result_array();		
		

		if ($comp_id==1)
		{
			 if($tinno==33)
			 {
				$this->load->view('billprint',$data);
			 }
			 else
			 {
				$this->load->view('billprintcgst',$data);
			 }

		  	
		}
		if ($comp_id==2)
		{
		   $this->load->view('billprintmpd',$data);	
		}
	}   
	public function billedit()

	{	
	    $bill_no=$this->uri->segment(3);  
		$comp_id=$this->uri->segment(4);
		$yearid=$this->uri->segment(5);
		
		$this->db->where('typee', 0);	
		$this->db->where('bill_no', $bill_no); 
		$this->db->where('comp_id', $comp_id);  
		$this->db->where('yearid', $yearid);  			
		
		$this->db->select('bill_no,vch_no,comp_id,bill_date,remarks,netval,pty_code,service_code,yearid');	 
	    $data['billing'] = $this->db->get('trnbilling1')->result_array(); 
		
	    $this->db->order_by('indx');  
		$this->db->where('bill_no', $bill_no); 
		$this->db->where('comp_id', $comp_id);	
		$this->db->where('trnbilling2.yearid', $yearid);  	
		$this->db->select('task_name,trnbilling2.sac,indx,trnbilling2.rate,trnbilling2.amount,
		           trnbilling2.gsttaxper,trnbilling2.taxper,trnbilling2.sgst,trnbilling2.cgst,
				   trnbilling2.taxamt,trnbilling2.totalamount, 
		           trnbilling2.task_id,trnbilling2.id  ');
        $this->db->join('trntask1', 'trntask1.task_code = trnbilling2.task_id');
	    $data['client'] = $this->db->get('trnbilling2')->result_array();
		$this->load->view('billedit',$data);	
	}
	public function billeditshort()

	{	
	    $bill_no=$this->uri->segment(3);  
		$comp_id=$this->uri->segment(4);
		$yearid=$this->uri->yearid(5);
		
		$this->db->where('yearid', $yearid);   
		$this->db->where('bill_no', $bill_no); 
        $this->db->where('comp_id', $comp_id);  		
		$this->db->where('typee', 1);
		$this->db->select('bill_no,vch_no,comp_id,bill_date,remarks,netval,pty_code,service_code');	 
	    $data['billing'] = $this->db->get('trnbilling1')->result_array(); 
		
	    $this->db->order_by('indx'); 
        $this->db->where('typee', 1);		
		$this->db->where('bill_no', $bill_no); 
		$this->db->where('comp_id', $comp_id);
		$this->db->where('yearid', $yearid);  		
		$this->db->select('it_name,trnbilling2.rate,trnbilling2.it_code');
        $this->db->join('masitem', 'masitem.it_code = trnbilling2.it_code');
	    $data['client'] = $this->db->get('trnbilling2')->result_array();
		 
		$this->load->view('billeditshort',$data);	
	}
	public function fillselect()
	{	
	    $task_code=60;// $_POST['task_code'];
         $this->db->where('task_code', '60'); 
      
            $users_arr = array();
            $this->db->order_by('task_code');					
            $this->db->select('task_code,task_name');                      
            $castxe= $this->db->get('trntask1');
            $row = mysqli_fetch_row($result);			
			foreach($castxe->result() as $data)
				{
				   $userid = $data->task_code;//$row['task_code'];
                   $name = $data->task_name;//$row['task_name'];
                   $users_arr[] = array("task_code" => $userid, "task_name" => $name);
				   
				} 
  
      echo json_encode($users_arr);
		
	}
	
	public function billlist()

	{	
	    $this->db->where('typee', 0);
        $this->db->order_by('bill_date,bill_no');  	        
		$this->db->select('company_name,trnbilling1.comp_id,ref_no,bill_no,netval,trnbilling1.bill_date,ac_name,remarks,billnoprint');		
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.pty_code');	
        $this->db->join('mascompany', 'mascompany.comp_id = trnbilling1.comp_id');			
	    $data['client'] = $this->db->get('trnbilling1')->result_array(); 	  
		$this->load->view('billlistalter',$data);	
		
	}
	
    public function setbilled()
    { 
	    $id=$this->input->post("id");		  
	    $strSQL ="update trntask2 set billed=1,free=0  where id='".$id."'";	
		$this->db->query($strSQL);
		echo "Moved!!!".$id;
		
	}
	public function setfree()
    { 
	    $id=$this->input->post("id");		  
	    $strSQL ="update trntask2 set billed=1,free=1 where id='".$id."'";	
		$this->db->query($strSQL);
		echo "Moved!!!".$id;
		
	}
	public function savebillshort()

	{ 		 
		$comp_id=$this->input->post("comp_idd");
		$billdate=date("d-m-Y"); 
		$yearid=2;
      	if ($comp_id)
			{
				$row = $this->db->query("SELECT MAX(bill_no) AS `maxid` FROM trnbilling1 where comp_id=$comp_id and yeard=$yearid")->row();
		        
				$bill_no = $row->maxid+1;
				$bill_date=date("d-m-Y");
				$itcode=$this->input->post("itcode");	
		        $netval=$this->input->post("amount");		        	
		        $pty_code=$this->input->post("accodefrom");
				$service_code=$this->input->post("accodeto");				
		        $remarks=$this->input->post("remarks");
				
				 
				$sql = "INSERT INTO trnbilling1 (comp_id,bill_no,typee,bill_date,netval,pty_code,yearid,service_code,remarks
				  ) VALUES ('" . $comp_id . "',
				  '" . $bill_no . "',
				  '1','" .$bill_date. "',
				  '" .$netval. "',				 
				  '" .$pty_code . "',
				  '" .$yearid . "',
				  '" .$service_code. "',				 
				  '".$remarks."')";
					 
	            $this->db->query($sql);
	            
				//$this->insertbilling($netval,$comp_id,$pty_code,$service_code,$bill_no);
				$rate = $netval; 
				$qty=1;
				$ptycode = $pty_code;
				
				$tabledata=$_POST["tabledata"];
				$decode_data = json_decode($tabledata);
				$trow=1;
				foreach($decode_data as $item) {
					 
					$amount = $item->amount;
					$qty=1;
					$itcode = $item->itcode;
					if  ($amount>0 ) {
						 
					   $sql = "INSERT INTO trnbilling2(comp_id,indx,typee,bill_no,it_code,bill_date,yearid,qty,rate,service_code,pty_code
					  ) VALUES ('" .$comp_id ."','".$trow. "','1','" .$bill_no."','".$itcode."',
							  '" . $bill_date."',
							  '" .$yearid . "',
							  '" . $qty."',
							  '" . $amount."',	
							  '" . $service_code."',
							  '" . $ptycode."')";
						  
					 $this->db->query($sql); 
					 $trow=$trow+1;
					 
					}
				}
				/////
				/////if  ($rate>0 ) {
				/////	   $sql = "INSERT INTO trnbilling2(comp_id,indx,typee,bill_no,it_code,bill_date,qty,rate,service_code,pty_code
				/////	  ) VALUES ('" . $comp_id . "','1','1','" . $bill_no . "','" . $itcode . "',
				/////	  '" . $bill_date . "',
				/////	  '" . $qty . "',
				/////	  '" . $rate . "',	
				/////	  '" . $service_code. "',
				/////	  '" . $ptycode. "')";
				/////	 $this->db->query($sql); 
				/////}
				//////////////
				
	  }	
		
	}
	private  function getmax()
    {
        $str='000000';$stringlen=0;
        $retvalue=KnittedFabInward::max('inwardnumber');
        if ($retvalue === null)
        {
            $retvalue=1;
            $stringlen=1;
        }
        elseif ($retvalue >=1)
        {
            $stringlen=$retvalue;
            $retvalue=$retvalue+1;
        }
         $stringlen=strlen($retvalue);
        switch ($stringlen) {
            case 1:
            $str='00000';
                break;
            case 2:
            $str='0000';
                break;
            case 3:
            $str='000';
                break;
            case 4:
                $str='00';
                break;
            case 5:
                $str='0';
                break;  
            case 6:
                $str='';
                break;               
            default:
            $str='0';
        }
        $retvalue=$str.$retvalue.'/20-21';
        return $retvalue;
    }
	public function savebill()

	{ 		 
		$yearid=$this->input->post("yearid");;
	    $comp_id=$this->input->post("comp_idd");
		$billdate=date("d-m-Y");
      	if ($comp_id)
			{
				$row = $this->db->query("SELECT MAX(bill_no) AS `maxid` FROM trnbilling1 where comp_id=$comp_id and yearid=$yearid")->row();
		        
				$bill_no = $row->maxid+1;$retvalue=1;
				//////////////////////////////
				$str='0000';$stringlen=0;
				$stringlen=$bill_no;
				 $stringlen=strlen($bill_no);
				 switch ($stringlen) { 
					case 1:
						$str='000';
						break;
					case 2:
						$str='00';
						break; 
					case 3:
							$str='0';
							break; 		 
					case 4:
						$str='';
						break;               
					default:
					$str='0';
				}

				$mid = $this->db->query("SELECT prefix FROM masyearr where  year_id=$yearid")->row();
		        $bill_noprintmid = $mid->prefix; 
				$billnoprint=$bill_noprintmid.$str.$bill_no ;
				/////////////////////////////
				$bill_date=date("d-m-Y");
		        $netval=$this->input->post("amount");		        	
		        $pty_code=$this->input->post("accodefrom");
				$service_code=$this->input->post("accodeto");				
		        $remarks=$this->input->post("remarks");
				$roundoff=$this->input->post("roundoff");
				
				 
				$sql = "INSERT INTO trnbilling1 (comp_id,bill_no,billnoprint,yearid,roundoff,bill_date,netval,pty_code,service_code,remarks
				  ) VALUES ('" . $comp_id . "',
				  '" . $bill_no . "',
				  '" . $billnoprint . "',
				  '" . $yearid . "',
				  '" . $roundoff . "',
				  '" . $bill_date . "',
				  '" . $netval . "',				 
				  '" . $pty_code . "',
				  '" . $service_code . "',				 
				  '".$remarks."')";
					 
	            $this->db->query($sql);
	            
				$this->insertbilling($netval,$comp_id,$pty_code,$service_code,$bill_no,$yearid);
				$tabledata=$_POST["tabledata"];
				$decode_data = json_decode($tabledata);
				 
				$trow=1; 
				$strdetail	='';
				foreach($decode_data as $item) {
					//rate,sac,taxper,taxableamt,cgst,sgst,price,gst,ptycode,taskid,task_code
					$rate = $item->rate; $qty=1;
					$sac = $item->sac;
					$taxper = $item->taxper;
					$taxableamt = $item->taxableamt;
					$cgst = $item->cgst;$sgst = $item->sgst;$taxamt=$cgst +$sgst; 
					$totalamount = $item->price;
					$gst = $item->gst;
					$sac = $item->sac;
					$ptycode = $item->ptycode;
					$taskid = $item->taskid;$task_code = $item->task_code;
				    
					if  ($rate>0 ) {
						
						$strSQL ="update trntask2 set billed=1 where id='".$taskid."'";	
						$this->db->query($strSQL);
					  
					   $sql = "INSERT INTO trnbilling2(comp_id,indx,sac,bill_no,bill_date,yearid,qty,rate,amount,sgst,cgst,gsttaxper,taxper,taxamt,totalamount,service_code,pty_code,task_id,id
					  ) VALUES ('" . $comp_id . "','" . $trow . "','". $sac."',
					  '" . $bill_no . "',
					  '" . $bill_date . "',
					  '" . $yearid . "',
					  '" . $qty . "',
					  '" . $rate . "',
					  '" . $taxableamt . "',
					  '" . $sgst. "',
					  '" . $cgst. "',
					  '" . $gst . "',
					  '" . $taxper. "',
					  '" . $taxamt. "',
					  '" . $totalamount. "',
					  '" . $service_code. "',
					  '" . $ptycode. "',
					  '" . $task_code. "',				 
					  '" . $taskid. "')";
						  
					 $this->db->query($sql); 
					 $trow=$trow+1;
					 
					}
				}
	  }	
		
	}
	
	public function insertbilling($amount,$comp_id,$ptycode,$salescode,$bill_no,$yearid)
	{
		 $remarks='';
		if ($amount > 0) $dramount=-$amount;
		$reamrks='';
		$vchcode=$this->getmaxaccinner(); 
		
        $strSQL="insert into accentry(ac_code,oppac_code,vch_no,vch_type,comp_id,dr_amt,vchid,remarks,bill_no,yearid)  
	    	values('". $ptycode."','". $salescode."','". $vchcode."','SAL',". $comp_id.",". $dramount.",'1','". $remarks."','". $bill_no."','". $yearid."')";   
		
		$result=$this->db->query($strSQL);
		
		$strSQL="insert into accentry(ac_code,oppac_code,vch_no,vch_type,comp_id,cr_amt,vchid,remarks,bill_no,yearid)  
		  values('". $salescode."','". $ptycode."','". $vchcode."','SAL','". $comp_id."','". $amount."','2','". $remarks."','". $bill_no."','". $yearid."')";   
						   
		$result=$this->db->query($strSQL);
		
		$sql = "update trnbilling1  set  vch_no='".$vchcode."'  where comp_id='".$comp_id."' and yearid='".$yearid."'  and  bill_no='".$bill_no."'"; 
		
        $this->db->query($sql);	
	}	
	
	
	function getmaxaccinner()
	{
		$billno = 0;
		$row = $this->db->query("SELECT MAX(vch_no) AS `maxid` FROM accentry")->row();
		return $billno = $row->maxid+1; 
	}
	public function savebilledit()
	{ 		 
		$comp_id=$this->input->post("comp_idd");		 
      	if ($comp_id)
			{
				$bill_no = $this->input->post("bill_no");
					//////////////////////////////
					$str='0000';$stringlen=0;
				    $stringlen=$bill_no;
					 $stringlen=strlen($bill_no);
					 switch ($stringlen) { 
						case 1:
							$str='000';
							break;
						case 2:
							$str='00';
							break; 
					    case 3:
								$str='0';
								break; 		 
						case 4:
							$str='';
							break;               
						default:
						$str='0';
					}
	                $yearid=$this->input->post("yearid");
					$mid = $this->db->query("SELECT prefix FROM masyearr where  year_id=$yearid")->row();
					$bill_noprintmid = $mid->prefix; 
				 	$billnoprint=$bill_noprintmid.$str.$bill_no ;
					/////////////////////////////
				$vch_no = $this->input->post("vch_no");
				$bill_date=$this->input->post("bill_date");
		        $netval=$this->input->post("netval");		        	
				$pty_code=$this->input->post("accodefrom");
				
				$service_code=$this->input->post("accodeto");				
		        $remarks=$this->input->post("remarks");
				$roundoff=$this->input->post("roundoff");
				
				$sql = "update trnbilling1  set 
				           bill_date='".$bill_date."',billnoprint='".$billnoprint."',netval='" .$netval."',roundoff='" .$roundoff."',
						   pty_code='".$pty_code."',service_code='".$service_code ."',
						   remarks='".$remarks."' where  bill_no='".$bill_no."' and  yearid='".$yearid."' and comp_id='".$comp_id."' "; 
				 $bill_date = substr($bill_date, 6, 4).'-'.substr($bill_date,3, 2).'-'.substr($bill_date,0, 2);	
				$this->updatebilling($netval,$comp_id,$pty_code,$service_code,$bill_date,$vch_no,$yearid);
				 
				 
	            $this->db->query($sql); 		
				$tabledata=$_POST["tabledata"];
				$decode_data = json_decode($tabledata);
				  
				  
				$trow=1; 
				$strdetail	='';
				foreach($decode_data as $item) {
					//rate,sac,taxper,taxamt taxableamt,cgst,sgst,totalamount,gst,taskid,task_code
					$qty=1;
					$rate = $item->rate;
					 
					$taxper = $item->taxper;
					$cgst = $item->cgst;$sgst = $item->sgst;$taxamt=$cgst +$sgst; 
					$totalamount = $item->totalamount;
					$gst = $item->gst;
					$sac = $item->sac;
					$taskid = $item->taskid;
					$task_code = $item->task_code;
					$indx = $item->indx;
					if  ($rate>0 ) {
						$sql = "update trnbilling2  set 
								bill_date='".$bill_date. "',qty='" . $qty . "',sac='" .$sac."',
								rate='" . $rate . "',amount='" . $rate . "',
								sgst='" . $sgst . "',cgst='" . $cgst . "',
								gsttaxper='". $gst. "',taxper='" . $taxper . "',
								taxamt='" . $taxamt . "',totalamount='" . $totalamount . "',
								pty_code='" . $pty_code . "',service_code='" . $service_code . "',
								id='".$taskid. "',task_id='".$task_code."' 
								where      yearid='".$yearid."' and  bill_no='" . $bill_no . "' and comp_id='" . $comp_id . "' and indx='". $indx."'"; 
						  
						$this->db->query($sql);
						
                	$trow=$trow+1;	
                    }					
				}
	  }	
	  echo 'Updated!!!!!';
	 
	}
	public function savebilleditshort()
	{ 		 
		$comp_id=$this->input->post("comp_idd");		 
      	if ($comp_id)
			{
				$bill_no = $this->input->post("bill_no");
				$vch_no = $this->input->post("vch_no");
				$bill_date=$this->input->post("bill_date");
		        $netval=$this->input->post("netval");		        	
		        $pty_code=$this->input->post("accodefrom");
				$service_code=$this->input->post("accodeto");				
		        $remarks=$this->input->post("remarks");
				$itcode=$this->input->post("itcode");
				$yearid=$this->input->post("yearid");
				
				$sql = "update trnbilling1  set 
				           bill_date='".$bill_date."',netval='" .$netval."',
						   pty_code='".$pty_code."',service_code='".$service_code ."',
						   remarks='".$remarks."' where  bill_no='".$bill_no."' and  yearid='".$yearid."'  and comp_id='".$comp_id."' "; 
				  $bill_date = substr($bill_date, 6, 4).'-'.substr($bill_date,3, 2).'-'.substr($bill_date,0, 2);	
				 $this->updatebilling($netval,$comp_id,$pty_code,$service_code,$bill_date,$vch_no,$yearid);
				 
				 
	            $this->db->query($sql);  
				//if  ($netval>0 ) {
						//$sql = "update trnbilling2  set 
						//		bill_date='".$bill_date."',qty='1', 
						//		rate='".$netval."',amount='".$netval."',
						//		where  bill_no='".$bill_no."' and comp_id='".$comp_id."' and indx='1'"; 
						  
					//	$this->db->query($sql);
                    //}					
				}
	   
	  echo 'Updated!!!!!';
	 
	}
	public function updatebilling($amount,$comp_id,$ptycode,$salescode,$vch_date,$vch_no,$yearid)
	{
		 
		if ($amount > 0) $dramount=-$amount;
		$reamrks=''; 
		 		
        $sql = " update accentry set   dr_amt='$dramount',ac_code='$ptycode',
				oppac_code='$salescode',remarks='$reamrks',vch_dt='$vch_date'									
				where vch_type='SAL'		
                and  vch_no ='$vch_no'  and comp_id ='$comp_id' and vchid='1'  and  yearid='".$yearid."' ";	
         	
	    $this->db->query($sql);
		 	
		$sql = " update accentry set 
		        cr_amt='$amount',oppac_code='$ptycode',ac_code='$salescode',remarks='$reamrks',
                vch_dt='$vch_date'								
				where vch_type='SAL'	and comp_id ='$comp_id' and vch_no ='$vch_no'	  and vchid='2'  and  yearid='".$yearid."' ";	
		$this->db->query($sql);		
        	
	}	
	public function getbilllist()
	{
		$ac_code=$_POST['ac_code'];
		$showall=0;
		$showall=$_POST['showall'];
		$comp_idd=$_POST['comp_idd'];
		
		if(empty($_POST["showall"])) { $showall=0;}
		
		$this->db->order_by('trntask2.task_code,task_name');  	
        $this->db->where('billed', 0);	
		if ($showall==0)
		{
         
   		}
		else if ($showall==1)
		{
            $this->db->where('movetotask', 4);	
   		}
		$this->db->where_in('accmasaccounts.ac_code', $ac_code);		  
		$this->db->select('task_name,ac_name,trntask2.ac_code,sac,taxper,amount,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id   ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
        $this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
        $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');		
	    $client = $this->db->get('trntask2')->result_array();
		
		$i=1; 
		$str='';
	 	$str=$str.'<table style="border-collapse:collapse;" id="dataTable" name="dataTable" border="1" class="table">
		<tr class="AdminTableHeader">
		<td>S.No</td>
		
        <td>Task Name</td>';
  		
		if ($comp_idd==1)
		{
			$str=$str.'<td>S.A.C.</td> 
			<td>Rate</td>
			<td>Tax Per</td><td>Taxable Amount</td>
			<td>CGST</td><td>SGST</td>';
		}
		$str=$str.'<td>Amount</td> <td>Status</td>
		</tr>';
 
		foreach ($client as $clientt) 
		   {		
		    $id=$clientt['id'];
			$str=$str.'<TR>';
			
			$str=$str."<TD><INPUT type='text' readonly class='test'  id='sno$i'	size='4' value='$i'  size='4' onchange='totalIt()' name='sno[]'/>";
			$str=$str."<INPUT type='hidden' readonly class='test'  id='snoo$i'	size='4' value='$i'  size='4'  readonly name='snoo[]'/>";
			$acname=$clientt['ac_name'];
			$str=$str."<INPUT type='hidden'   class='test' size='4' id='acname$i'  	value='$acname'  name='acname[]'/></TD>"; 
			
			$task_name=$clientt['task_name'];
			$str=$str."<TD style='max-width:150px;'>$task_name</TD> ";
			
            $sac=$clientt['sac']; 
            if ($comp_idd==1)
		    {			
			   $str=$str."<TD><INPUT type='text' class='test' size='4' id='sac$i' name='sac$i' value='$sac'  name='sac[]'/></TD>";
			}
			
			$amount=$clientt['amount']; $taxper=$clientt['taxper']; $ptycode=$clientt['ac_code']; $task_code=$clientt['task_code']; 
			
            $str=$str."<TD> <INPUT type='text' class='test' id='rate$i'	value='$amount'  size='4' onchange='totalIt()'  name='rate[]'/> ";
			$str=$str."<INPUT type='hidden' class='test' id='ptycode$i'	size='4' value='$ptycode'  name='ptycode[]'/>";
			$str=$str."<INPUT type='hidden' class='test' id='id$i'	size='4' value='$id'  name='id[]'/>";
            $str=$str."<INPUT type='hidden' class='test' id='task_code$i'	size='4' value='$task_code'  name='task_code[]'/> </TD>";
			
			if ($comp_idd==1)
		    {
				$str=$str."<TD><INPUT type='text' class='test' id='taxper$i' value='$taxper'  size='4' onchange='totalIt()'  name='taxper[]'/>  </TD>";					
				$str=$str."<TD><INPUT type='text' class='test' id='taxableamt$i' readonly='readonly'	size='4' value=''  name='taxableamt[]'/>  </TD> "; 					
				$str=$str."<TD><INPUT type='text' class='test' id='cgst$i'	readonly='readonly' value='$taxper'  size='4' onchange='totalIt()'  name='cgst[]'/></TD>"; 
				$str=$str."<TD><INPUT type='text' class='test' id='sgst$i' readonly='readonly' 	value=''  size='4' onchange='totalIt()'  name='sgst[]'/>  </TD>";		   
			    $str=$str."<TD><INPUT type='text' class='test' id='price$i' readonly='readonly'	size='4' value=''  name='price[]'/>"; 			
			    $str=$str."<INPUT type='hidden' class='test' id='gst$i' value=''  readonly='readonly'  size='4' onchange='totalIt()'  name='gst[]'/>";
				$str=$str."</TD>";
			}
			
			$str=$str."<TD><input type='hidden' onclick='billed($i,$id)'  name='buttonName' value='Already Billed' id='$i'/> ";
			$str=$str."<input type='hidden' onclick='free($i,$id)' id='free$i'    value='Free'/>  ";
			$str=$str."<input type='button' onclick='later($i)' id='later$i'   value='Later'/>";
			$str=$str."<input type='hidden' id='hdnCount' value='$i' name='hdnCount'></TD>"; 
            if ($comp_idd==2)
		    { 		
//style='display:none'		
			    $str=$str."<td><INPUT type='hidden'   id='sac$i' name='sac$i' value='testsac' size='1' name='sac[]'/> ";
				$str=$str."<INPUT type='hidden'   id='taxper$i' value='0'  size='1'   name='taxper[]'/> ";					
				$str=$str."<INPUT type='hidden'   id='taxableamt$i' readonly='readonly'	size='1' value=''  name='taxableamt[]'/>   "; 					
				$str=$str."<INPUT type='hidden'   id='cgst$i'	readonly='readonly' value='0'   size='1'  name='cgst[]'/>"; 
				$str=$str."<INPUT type='hidden'  id='sgst$i' readonly='readonly' 	value='0'  size='1'  name='sgst[]'/> ";		   
			    $str=$str."<INPUT type='hidden'   id='price$i' readonly='readonly'	size='1' value='0'  name='price[]'/>"; 			
			    $str=$str."<INPUT type='hidden'   id='gst$i' '  readonly='readonly'  size='1' value='0'  name='gst[]'/>";
				$str=$str."</TD>";
			}			
            			
			$str=$str."</tr>"; 
            $i=$i+1;  
		   }
        $str=$str.'</table>';
		echo $str;
	}
	
}