<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Accounts extends CI_Controller {

	  function __construct()
    {
        
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');
		if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
    }
	public function getbilllist()
	{
		$ac_code=$_POST['ac_code']; 
		$opnbal= 0;
		//$data['opnbal']=$this->getopnbal($ac_code);	
		//$data['closbal']=$this->getclosbal($ac_code);	
		
		$row = $this->db->query("SELECT opn_bal from accmasaccounts WHERE ac_code=$ac_code ")->row();
        if ($row)
			{
              $opnbal=$row->opn_bal;
			}
				
		$this->db->order_by('company_name','desc'); 
		$this->db->group_by('company_name,accentry.ac_code');
		$this->db->where('accmasaccounts.ac_code', $ac_code);		  
		$this->db->select('company_name,sum(cr_amt) as cramt,sum(dr_amt) as dramt ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.ac_code');
        $this->db->join('mascompany', 'mascompany.comp_id = accentry.comp_id'); 
	    $client = $this->db->get('accentry')->result_array();
		$dramt=0;$cramt=0;$cramt=0;$closbal=0;$balance=0;
		$opnbalstring=0;
		if ($opnbal<0) { $opnbalstring=abs($opnbal).' Dr.';}
		else if ($opnbal>0) { $opnbalstring=abs($opnbal).' Cr.';}
		$i=1; 
		$str='';
	 	$str=$str.'<table style="border-collapse:collapse;" id="dataTable" name="dataTable" border="1" class="table">
		<tr class="AdminTableHeader">';
		$str=$str."<tr><td colspan='4'>Opening Balance</td> <td>$opnbalstring</td></tr>";
		$str=$str.'<tr><td>S.No</td> 
        <td>Company Under</td><td>Debit Amount</td><td>Credit Amount</td><td>Balance Amount</td></tr>';
       
		foreach ($client as $clientt) 
		   {		
		     
			$str=$str.'<TR>'; 
			$str=$str."<TD><INPUT type='text' readonly class='test'    value='$i'  size='4'/></td>";
			 
			$company_name=$clientt['company_name'];
			$str=$str."<td><INPUT type='text' readonly  class='test'  id='company_name$i' value='$company_name' /></TD>"; 
			$dramt=$clientt['dramt']; 
			
            $cramt=0;			
            $cramt=$clientt['cramt']; 	
			
			if (empty($cramt)) {
                 $cramt=0;
              }

			$drstring=0;
			
		    if ($dramt<0) { $drstring=abs($dramt).' Dr.';}
		    else if ($dramt>0) { $drstring=abs($dramt).' Cr.';}
		
            $str=$str."<TD> <INPUT type='text' class='test' id='rate$i'	value='$drstring'  size='4' /> </TD>";
			$str=$str."<TD><INPUT type='text' class='test' id='ptycode$i'	  value='$cramt' /></TD>";
			$closbal=$closbal+$cramt+$dramt;
			$balance=$cramt+$dramt;
			
			$balancestring=0;
		    if ($balance<0) { $balancestring=abs($balance).' Dr.';}
		    else if ($balance>0) { $balancestring=abs($balance).' Cr.';}
			
            $str=$str."<TD><INPUT type='text' class='test' id='balancre$i'	  value='$balancestring' /></TD>";  			
			$str=$str."</tr>"; 
            $i=$i+1;  
		   }
		    $closbal=$closbal+$opnbal;
		   	$closbalstring=0;
		    if ($closbal<0) { $closbalstring=abs($closbal).' Dr.';}
		    else if ($closbal>0) { $closbalstring=abs($closbal).' Cr.';}
		$str=$str."<tr><td colspan='4'>Closing Balance</td><td>$closbalstring</td>";   
        $str=$str.'</table>';
		echo $str;
	}
		 
	public function receiptprint()

	{	
	    $vch_no=$this->uri->segment(3);
        $comp_id=$this->uri->segment(4); 
        $ac_code=$this->uri->segment(5);   		
	
				
		$this->db->where('vch_no', $vch_no);
		$this->db->where('vch_type', 'REC');
        $this->db->where('mascompany.comp_id', $comp_id); 	 
		$this->db->where('accentry.ac_code', $ac_code);  	    
		$this->db->select('ac_name,partner,vch_no,vch_dt,remarks,
		company_name,mascompany.address1,mascompany.address2,mascompany.mobileno,mascompany.address3,
		emailid,gstno,cr_amt');	        
        $this->db->join('mascompany', 'mascompany.comp_id = accentry.comp_id');
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.oppac_code'); 		
	    $data['company'] = $this->db->get('accentry')->result_array(); 
 
		
		$this->db->where('accentry.ac_code', $ac_code);  	        
		$this->db->select('ac_name,clos_bal,address,contactno,gst,email');	        
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.ac_code');			
	    $data['masaccounts'] = $this->db->get('accentry')->result_array(); 
		 
		 
		if ($comp_id==1)
		{
		   $this->load->view('accounts/receiptprint',$data);	
		}
		if ($comp_id==2)
		{
		   $this->load->view('accounts/receiptprintmpd',$data);	
		}
	}   
	public function ledger()
	{    
    	
		
		//echo "<script type='text/javascript'>alert('$accode');</script>"; 
		$emp_code = $this->session->userdata('emp_code');
		//$id=$this->session->userdata('agentid');
	    $this->db->select('ac_name,ac_code');  
		//$this->db->where('comp_id', $id);
        $this->db->from('accmasaccounts');
	    $data['records']=$this->db->get();	
		
		if(!empty($_POST["accountname"])) 
		 {
			    $result = mysqli_query("SELECT ac_code from accmasaccounts WHERE ac_name = '".$_POST["accountname"]."'"); 
                $row = mysqli_fetch_row($result);//print_r($row);exit();
                $accode= $row[0];
		 }
		   
		$accode=$_POST["accountname"];
		if(!empty($_POST["accountname"])) 
		 {
	       	$this->db->select('vch_dt,vch_no,bill_no,remarks,dr_amt,cr_amt,
                               accmasaccounts.ac_name,accentry.ac_code,accmasaccounts.opn_bal as opnbal,address,
		                        contactno as mobile,accmasaccounts.tot_dr as totdr,accmasaccounts.tot_cr as totcr,
								accmasaccounts.clos_bal as closbal
		
		');  
	   
		 
		if(!empty($_POST["accountname"])) 
		 {  
		    $this->db->where('accentry.ac_code', $accode);
		    $date1=$this->input->post('datepicker1');
            $date2=$this->input->post('datepicker2');	
		    $data['date1']=$date1; $data['accname']=$_POST["accountname"];
		    $data['date2']=$date1;
            $data['caption']= 'Ledger Report From Date from '.$date1.' Period to '.$date2.' For '.$_POST["accountname"];
	        
			if(!empty($date1))
			{
				$dateone = new DateTime($this->input->post('datepicker1'));
				$date1=date_format($dateone, 'Y-m-d');
				$this->db->where('DATE(vch_dt) >=', $date1);
			}
           		   
		    $datee = new DateTime($this->input->post('datepicker2'));
		    $date2=date_format($datee, 'Y-m-d');	
            $this->db->where('DATE(vch_dt) <=', $date2);
		} 
		$this->db->order_by('vch_dt'); 
        $this->db->from('accmasaccounts');
	    $this->db->join('accentry', 'accmasaccounts.ac_code = accentry.ac_code');
		
		$data['acc']=$this->db->get();
		$data['opnbal']=$this->accountss($accode,$date1);
		$data['date1']=$this->input->post('datepicker1');
		$data['date2']=$this->input->post('datepicker2');
		$data['accname']=$this->input->post('accountname');
		
		 }		
		$this->load->view('accounts/ledger',$data);
	}
	 public function accountss($ac_code,$date1)	
	{  
	    $dramount=0;
		
		//$this->db->select('sum(dr_amt+cr_amt) as topup');  
		//$this->db->where('ac_code', $ac_code);
		//$this->db->where('DATE(vch_dt) <', $date1);
		//$this->db->from('accentry');
		
		//$test =$this->db->get();//print_r( $test);
		//foreach($test->result() as $data)
		//	{
			 // $dramount=$data->topup;	
		//	}
        $maxno=0;		
        $row = $this->db->query("SELECT opn_bal from accmasaccounts where  ac_code=". $ac_code."")->row();
        if ($row)
			{
              $maxno= $row->opn_bal;
			}
		return $maxno;
	}
	public function test()
	{
		   $keyword= $this->input->get('term', TRUE);
		   $accode= $this->input->get('accode', TRUE);
		   //$id=$this->session->userdata('agentid');
	       $row_num = 1;
		   
		    // $result = mysqli_query("SELECT ac_name FROM accmasaccounts where ac_name like '%".$keyword."%' and comp_id=" . $id. "");
			 
	       $result = mysqli_query("SELECT ac_name FROM accmasaccounts where ac_name like '%".$keyword."%' ");	
	       $data = array();
           if (!$result) {    die(mysqli_error());}
	         while ($row = mysqli_fetch_assoc($result)) {
		//$name = $row['ac_name'].'|'.$row['ac_code'].'|'.$row['address'].'|'.$row['address'].'|'.$row_num;
	     	$name = $row['ac_name'];
		    array_push($data, $name);	
	    }	
	    echo json_encode($data);
	}
	
	
	public function getmaxacc()
	{
		$billno = 0;
		$row = $this->db->query("SELECT MAX(vch_no) AS `maxid` FROM accentry")->row();
		echo $billno = $row->maxid+1; 
	}
	
	function checkaccnameavailnew()
	{
		if(!empty($_POST["accname"])) {
         $result = mysqli_query("SELECT count(*) FROM accmasaccounts WHERE ac_name='" . $_POST["accname"] . "'");
         $row = mysqli_fetch_row($result);
         $user_count = $row[0];
         if($user_count>0) {
			 echo "0";
          }
		  else{
			   echo "1";
         }
}
	}
	public function index()
	{  
		echo $branchcode = $this->session->userdata('branchcode');
     	$groupcode=0;
		 
	    $this->db->select('ac_name,ac_code,groupname,accmasaccounts.opn_bal as opnbal,address,
			contactno as mobileno,accmasaccounts.tot_dr as totdr,accmasaccounts.tot_cr as totcr,accmasaccounts.clos_bal as closbal');  
		//$this->db->where('comp_id', $id);
		if(!empty($_POST["accgroup"])) 
		 {  
 		     $groupcode=$_POST["accgroup"];
		   //  $this->db->where('accmasaccounts.group_code', $groupcode);
		} 
        $this->db->from('accmasaccounts');
		$this->db->join('accmasgroup', 'accmasgroup.group_code = accmasaccounts.group_code','left');
	    $data['records']=$this->db->get();		
	    $this->load->view('accountsadmin',$data);
	}
	public function journalentry()
	{
		
		if(!empty($_POST["monthn"])) 
		 {  
 		    $groupcode=$_POST["monthn"];		   
		}
        else { $groupcode=date('n');}
	   
	    $emp_code = $this->session->userdata('emp_code');
		$this->db->where('accentry.emp_code', $emp_code);
		
		$this->db->where('MONTH(vch_dt)',  $groupcode);
		$this->db->order_by('vch_no');
		$this->db->where('vch_type', 'JRN');
		 
	    $this->db->select('id,vch_no,accentry.ac_code,ac_name,abs(dr_amt) as amount,remarks,vch_type,vch_dt,oppac_code,comp_id');  
		 
		$this->db->where('dr_amt <',0);
        $this->db->from('accentry');
		$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.ac_code');
	    $data['records']=$this->db->get();	
		$data['monthn']=$groupcode;	
	 	$this->load->view('accounts/journalentry',$data); 
	}
	
	 public function getaccbillingjournal()

	  {
		 
        $vch_no=$_POST["vch_no"];
		 
	    $row = $this->db->query("SELECT  
		    abs(dr_amt) dramt,remarks,ac_code,comp_id,oppac_code,vch_dt from accentry  where vch_no=$vch_no  and vchid=1 ")->row();
        if ($row)
			{
             echo $row->dramt."$".$row->remarks."$".$row->ac_code."$".$row->comp_id."$".$row->oppac_code."$".$row->vch_dt;
			}
			 
	}//getaccbilling
	
    function savejournal()
	{
		
		$amount= $_POST['amount'];if ($amount > 0) $dramount=-$amount;
		$comp_id=$_POST['comp_idd']; 
		

		$accodefrom=$_POST['accodefrom'];
		$accodeto=$_POST['accodeto'];
		
		$reamrks='';
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}
		
		$vchcode=$this->getmaxaccinner(); 
		
		$emp_code = $this->session->userdata('emp_code');
        $strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,dr_amt,vchid,remarks)  
	    	values(". $accodefrom.",". $emp_code.",". $accodeto.",". $vchcode.",'JRN',". $comp_id.",". $dramount.",'1','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		$emp_code = $this->session->userdata('emp_code');
		$strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,cr_amt,vchid,remarks)  
		  values(". $accodeto.",". $emp_code.",". $accodefrom.",". $vchcode.",'JRN',". $comp_id.",". $amount.",'2','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		
        if(!$result){
           echo(mysql_error());
        }
		else
		{  echo "Sucessfully Updated";
	     }
		
	}
	function editsavebilljournal()
	{
        
		$amount= $_POST['editamount']; 
		$dramount= -1 * abs($amount);
		$comp_id=$_POST['comp_id'];

		$editaccodefrom=$_POST['editaccodefrom'];
		$editaccodeto=$_POST['editaccodeto'];
		 
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}	
		$vch_no=$_POST['vch_no'];
		$vch_date=$_POST['vch_date'];
		
        $sql = " update accentry set 
		        dr_amt='$dramount',
				ac_code='$editaccodefrom',
				oppac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='JRN'		
                where  vch_no ='$vch_no'  and vchid='1' ";	
         	
	    $this->db->query($sql);
		 	
		$sql = " update accentry set 
		        cr_amt='$amount',
				oppac_code='$editaccodefrom',
				ac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='JRN'		
                where  vch_no ='$vch_no' and vchid='2' ";				 
	  	  
		 $this->db->query($sql);
		   echo "Sucessfully Updated";
		    
	      
		
	}
	public function contraentry()
	{
		
		if(!empty($_POST["monthn"])) 
		 {  
 		    $groupcode=$_POST["monthn"];		   
		}
        else { $groupcode=date('n');}
	   
	    $emp_code = $this->session->userdata('emp_code');
		$this->db->where('accentry.emp_code', $emp_code);
		
		$this->db->where('MONTH(vch_dt)',  $groupcode);
		$this->db->order_by('vch_no');
		$this->db->where('vch_type', 'CON');
		 
	    $this->db->select('id,vch_no,accentry.ac_code,ac_name,abs(dr_amt) as amount,remarks,vch_type,vch_dt,oppac_code,comp_id');  
		 
		$this->db->where('dr_amt <',0);
        $this->db->from('accentry');
		$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.ac_code');
	    $data['records']=$this->db->get();	
		$data['monthn']=$groupcode;	
	 	$this->load->view('accounts/contraentry',$data); 
	}
	
	 public function getaccbillingcontra()

	  {
		 
        $vch_no=$_POST["vch_no"];
		 
	    $row = $this->db->query("SELECT  
		    abs(dr_amt) dramt,remarks,ac_code,comp_id,oppac_code,vch_dt from accentry  where vch_no=$vch_no  and vchid=1 ")->row();
        if ($row)
			{
             echo $row->dramt."$".$row->remarks."$".$row->ac_code."$".$row->comp_id."$".$row->oppac_code."$".$row->vch_dt;
			}
			 
	}//getaccbilling
	
    function savecontra()
	{
		
		$amount= $_POST['amount'];if ($amount > 0) $dramount=-$amount;
		$comp_id=$_POST['comp_idd']; 
		

		$accodefrom=$_POST['accodefrom'];
		$accodeto=$_POST['accodeto'];
		
		$reamrks='';
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}
		
		$vchcode=$this->getmaxaccinner(); 
		
		$emp_code = $this->session->userdata('emp_code');
        $strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,dr_amt,vchid,remarks)  
	    	values(". $accodefrom.",". $emp_code.",". $accodeto.",". $vchcode.",'CON',". $comp_id.",". $dramount.",'1','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		$emp_code = $this->session->userdata('emp_code');
		$strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,cr_amt,vchid,remarks)  
		  values(". $accodeto.",". $emp_code.",". $accodefrom.",". $vchcode.",'CON',". $comp_id.",". $amount.",'2','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		
        if(!$result){
           echo(mysql_error());
        }
		else
		{  echo "Sucessfully Updated";
	     }
		
	}
	function editsavebillcontra()
	{
        
		$amount= $_POST['editamount']; 
		$dramount= -1 * abs($amount);
		$comp_id=$_POST['comp_id'];

		$editaccodefrom=$_POST['editaccodefrom'];
		$editaccodeto=$_POST['editaccodeto'];
		 
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}	
		$vch_no=$_POST['vch_no'];
		$vch_date=$_POST['vch_date'];
		
        $sql = " update accentry set 
		        dr_amt='$dramount',
				ac_code='$editaccodefrom',
				oppac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='CON'		
                where  vch_no ='$vch_no'  and vchid='1' ";	
         	
	    $this->db->query($sql);
		 	
		$sql = " update accentry set 
		        cr_amt='$amount',
				oppac_code='$editaccodefrom',
				ac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='CON'		
                where  vch_no ='$vch_no' and vchid='2' ";				 
	  	  
		 $this->db->query($sql);
		   echo "Sucessfully Updated";
		    
	      
		
	}
	public function paymententry()
	{
		
		if(!empty($_POST["monthn"])) 
		 {  
 		    $groupcode=$_POST["monthn"];		   
		}
        else { $groupcode=date('n');}
	   
	    $emp_code = $this->session->userdata('emp_code');
		$this->db->where('accentry.emp_code', $emp_code);
		
		$this->db->where('MONTH(vch_dt)',  $groupcode);
		$this->db->order_by('vch_no');
		$this->db->where('vch_type', 'PAY');
		$id=0;//$this->session->userdata('agentid');
	    $this->db->select('id,vch_no,accentry.ac_code,ac_name,abs(dr_amt) as amount,remarks,vch_type,vch_dt,oppac_code,comp_id');  
		//$this->db->where('accentry.comp_id', $id);
		$this->db->where('dr_amt <',0);
        $this->db->from('accentry');
		$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.ac_code');
	    $data['records']=$this->db->get();	
		$data['monthn']=$groupcode;	
	 	$this->load->view('accounts/paymententry',$data); 
	}
	
	public function getaccbillingreceipt()
	{
		$vch_no=$_POST["vch_no"];		 
	    $row = $this->db->query("SELECT  
		    cr_amt,remarks,ac_code,comp_id,oppac_code,vch_dt from accentry  where vch_no=$vch_no  and vchid=1 ")->row();
        if ($row)
			{
             echo $row->cr_amt."$".$row->remarks."$".$row->ac_code."$".$row->comp_id."$".$row->oppac_code."$".$row->vch_dt;
			}
			 
	}//getaccbillingreceipt
	public function receiptentry()
	{
		echo's'.$admin = $this->session->userdata('branchcode');
	//	echo $admin = $this->session->userdata('admin');
		if(!empty($_POST["monthn"])) 
		 {  
 		    $groupcode=$_POST["monthn"];		   
		}
        else { $groupcode=date('n');}
	   
	    $emp_code = $this->session->userdata('emp_code');
		$this->db->where('accentry.emp_code', $emp_code);
		
		$this->db->where('MONTH(vch_dt)',  $groupcode);
		$this->db->order_by('vch_no');
		$this->db->where('vch_type', 'REC');
		 
	    $this->db->select('id,vch_no,accentry.ac_code,ac_name,cr_amt as amount,remarks,vch_type,vch_dt,oppac_code,comp_id');  
		 
		$this->db->where('cr_amt >',0);
        $this->db->from('accentry');
		$this->db->join('accmasaccounts', 'accmasaccounts.ac_code = accentry.ac_code');
	    $data['records']=$this->db->get();	
		$data['monthn']=$groupcode;	
	 	$this->load->view('accounts/receiptentry',$data); 
	}
	function savereceipt()
	{
		
		$amount= $_POST['amount'];if ($amount > 0) $dramount=-$amount;
		$comp_id=$_POST['comp_idd'];

		$accodefrom=$_POST['accodefrom'];
		$accodeto=$_POST['accodeto'];
		
		$reamrks='';
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}
		
		$vchcode=$this->getmaxaccinner(); 
		
		$emp_code = $this->session->userdata('emp_code');
        $strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,cr_amt,vchid,remarks)  
	    	values(". $accodefrom.",". $emp_code.",". $accodeto.",". $vchcode.",'REC',". $comp_id.",". $amount.",'1','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		$emp_code = $this->session->userdata('emp_code');
		$strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,dr_amt,vchid,remarks)  
		  values(". $accodeto.",". $emp_code.",". $accodefrom.",". $vchcode.",'REC',". $comp_id.",". $dramount.",'2','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		
        if(!$result){
           echo(mysql_error());
        }
		else
		{  echo "Sucessfully Updated";
	     }
		
	}
	function editsavebillreceipt()
	{
        
		$amount= $_POST['editamount']; 
		$dramount= -1 * abs($amount);
		$comp_id=$_POST['comp_id'];

		$editaccodefrom=$_POST['editaccodefrom'];
		$editaccodeto=$_POST['editaccodeto'];
		 
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}	
		$vch_no=$_POST['vch_no'];
		$vch_date=$_POST['vch_date'];
		
        $sql = " update accentry set 
		        cr_amt='$amount',
				ac_code='$editaccodefrom',
				oppac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='REC'		
                where  vch_no ='$vch_no'  and vchid='1' ";	
         	
	    $this->db->query($sql);
		 	
		$sql = " update accentry set 
		        dr_amt='$dramount',
				oppac_code='$editaccodefrom',
				ac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='REC'		
                where  vch_no ='$vch_no' and vchid='2' ";				 
	  	  
		 $this->db->query($sql);
		   echo "Sucessfully Updated";
		    
	      
		
	}
	
	 function editsavebill()
	{
        
		$amount= $_POST['editamount']; 
		$dramount= -1 * abs($amount);
		$comp_id=$_POST['comp_id'];

		$editaccodefrom=$_POST['editaccodefrom'];
		$editaccodeto=$_POST['editaccodeto'];
		 
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}	
		$vch_no=$_POST['vch_no'];
		$vch_date=$_POST['vch_date'];
		
        $sql = " update accentry set 
		        dr_amt='$dramount',
				ac_code='$editaccodefrom',
				oppac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='PAY'		
                where  vch_no ='$vch_no'  and vchid='1' ";	
         	
	    $this->db->query($sql);
		 	
		$sql = " update accentry set 
		        cr_amt='$amount',
				oppac_code='$editaccodefrom',
				ac_code='$editaccodeto',
				remarks='$remarks',
                vch_dt='$vch_date',									
				vch_type='PAY'		
                where  vch_no ='$vch_no' and vchid='2' ";				 
	  	  
		 $this->db->query($sql);
		   echo "Sucessfully Updated";
		    
	      
		
	}
	
    function savepayment()
	{
		
		$amount= $_POST['amount'];if ($amount > 0) $dramount=-$amount;
		$comp_id=$_POST['comp_idd'];//$this->session->userdata('agentid');
		
 

		$accodefrom=$_POST['accodefrom'];
		$accodeto=$_POST['accodeto'];
		
		$reamrks='';
		$remarks=  $_POST['remarks'];
		if(empty($_POST["remarks"])) {
		   $remarks='';
		}
		
		$vchcode=$this->getmaxaccinner(); 
		
		$emp_code = $this->session->userdata('emp_code');
        $strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,dr_amt,vchid,remarks)  
	    	values(". $accodefrom.",". $emp_code.",". $accodeto.",". $vchcode.",'PAY',". $comp_id.",". $dramount.",'1','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		$emp_code = $this->session->userdata('emp_code');
		$strSQL="insert into accentry(ac_code,emp_code,oppac_code,vch_no,vch_type,comp_id,cr_amt,vchid,remarks)  
		  values(". $accodeto.",". $emp_code.",". $accodefrom.",". $vchcode.",'PAY',". $comp_id.",". $amount.",'2','". $remarks."')";   
		
		$result=$this->db->query($strSQL);
		
        if(!$result){
           echo(mysql_error());
        }
		else
		{  echo "Sucessfully Updated";
	     }
		
	}
	
	function getmaxaccinner()
	{
		$billno = 0;
		$row = $this->db->query("SELECT MAX(vch_no) AS `maxid` FROM accentry")->row();
		return $billno = $row->maxid+1; 
				
		//$id=1;	
	    //$result = mysqli_query("SELECT  max(vch_no) as code from accentry"); 
	   // $row = mysqli_fetch_row($result);
	    //$maxno= $row[0];
	  //if (($maxno)==0)
	 // {
	//	return $maxno=1;
	 // }
	 // else if ($maxno>0)
	 // {
		  
         
	   //	return $maxno=$maxno+1;
		
	  //}
	  
	}
		
    public function billlist()

	{	
	   if (isset($_POST['comp_id']))
			{  
               if ($_POST['comp_id']>0)
			  {
			      $this->db->where('mascompany.comp_id', $_POST['comp_id']);
			  }		
			 
			  $data['comp_id'] = $_POST['comp_id'];
        }
		else
		{
			
		}
		
        $this->db->order_by('bill_date,bill_no');  	        
		$this->db->select(' roundoff,trnbilling1.ac_code,company_name,trnbilling1.comp_id,ref_no,bill_no,netval,trnbilling1.bill_date,ac_name,remarks');		
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.ac_code');	
        $this->db->join('mascompany', 'mascompany.comp_id = trnbilling1.comp_id');			
	    $data['client'] = $this->db->get('trnbilling1')->result_array(); 
		
		
		$this->load->view('billlistalter',$data);	
		
	}
		public function billedit()

	{	
	    $bill_no=$this->uri->segment(3);  
		$this->db->where('bill_no', $bill_no);  	        
		$this->db->select('bill_no,bill_date,remarks,
		company_name,mascompany.address1,mascompany.address2,mascompany.mobileno,mascompany.address3,
		emailid,gstno,state,netval,');	        
        $this->db->join('mascompany', 'mascompany.comp_id = trnbilling1.comp_id');			
	    $data['company'] = $this->db->get('trnbilling1')->result_array(); 

		$this->db->where('bill_no', $bill_no);  	        
		$this->db->select('ac_name,address,contactno,gst,email');	        
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.ac_code');			
	    $data['masaccounts'] = $this->db->get('trnbilling1')->result_array();

        $this->db->where('bill_no', $bill_no);  	        
		$this->db->select('sac,rate,task_name,trnbilling2.amount,trnbilling2.taxper,
		trnbilling2.taxamt,trnbilling2.task_id,trnbilling2.id');
        $this->db->join('trntask1', 'trntask1.task_code = trnbilling2.task_id');		
        $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');			
	    $data['client'] = $this->db->get('trnbilling2')->result_array();		
		
		$this->load->view('accounts/billsedit',$data);	
		
	}
		public function billprint()

	{	
	    $bill_no=$this->uri->segment(3);
        $comp_id=$this->uri->segment(4);  		
		$this->db->where('bill_no', $bill_no);
        $this->db->where('mascompany.comp_id', $comp_id); 		
             
		$this->db->select('bill_no,bill_date,remarks,
		company_name,mascompany.address1,mascompany.address2,mascompany.mobileno,mascompany.address3,
		emailid,gstno,state,netval,');	        
        $this->db->join('mascompany', 'mascompany.comp_id = trnbilling1.comp_id');			
	    $data['company'] = $this->db->get('trnbilling1')->result_array(); 

		$this->db->where('bill_no', $bill_no);  	        
		$this->db->select('ac_name,address,contactno,gst,email');	        
        $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trnbilling1.ac_code');			
	    $data['masaccounts'] = $this->db->get('trnbilling1')->result_array();
        
		$this->db->where('bill_no', $bill_no);
        $this->db->where('trnbilling1.comp_id', $comp_id); 
		$this->db->select('bank_name,bank_acno,address1');	        
        $this->db->join('masbank', 'masbank.comp_id = trnbilling1.comp_id');			
	    $data['masbank'] = $this->db->get('trnbilling1')->result_array();
		
		$this->db->where('trnbilling2.comp_id', $comp_id); 
        $this->db->where('bill_no', $bill_no);  	        
		$this->db->select('cgst,sgst,gsttaxper,totalamount,sac,rate,task_name,trnbilling2.amount,trnbilling2.taxper,
		trnbilling2.taxamt,trnbilling2.task_id,trnbilling2.id');
        $this->db->join('trntask1', 'trntask1.task_code = trnbilling2.task_id');		
        $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');			
	    $data['client'] = $this->db->get('trnbilling2')->result_array();		
		
		if ($comp_id==1)
		{
		   $this->load->view('billprint',$data);	
		}
		if ($comp_id==2)
		{
		   $this->load->view('billprintbill',$data);	
		}
	}   
   
	public function readyforbill ()	
	{
		$branchcode = $this->session->userdata('branchcode');
		
		if (isset($_POST['accode']))
			{  
               if ($_POST['accode']>0)
			  {
			      $this->db->where('trntask2.ac_code', $_POST['accode']);
			  }		
			 
			  $data['accode'] = $_POST['accode'];
        }
		else
		{
			
		}
		
	    $data['followupp'] = 0;
	   	$followupp=0;
        if (isset($_POST['followupp']))
			{
             
			  $followupp= $_POST['followupp'];
			  if ($followupp>0)
			  {
			      $this->db->where('trntask2.task_code', $_POST['followupp']);
			  }
			  $data['followupp'] = $_POST['followupp'];
        }
		else
		{
			
		}
		
		
		$comp_id=$this->uri->segment(3); 	
		if (isset($comp_id))
			{
             
			  $this->db->where('trntask2.task_code', $comp_id);
			  $data['followupp'] =$comp_id;
        }
		else
		{
			 
		}		 
		
		$this->db->where('trntask2.movetotask =',4);			
		$admin = $this->session->userdata('admin');
		if ($admin==1)
		{
			
		}
		else if ($admin==0)
		{
		//	$this->db->where('group_code', $branchcode);	
		}
		//$this->db->where('job_code', 4);
		$this->db->where('billed', 0);
	    $this->db->order_by('ac_name,massubjob.subjob_code,task_name,trntask3.reminder_code,reminder_date,followupdoneat,nextreminderat,
		trntask2.id,trntask1.task_code,ac_name,trntask2.ac_code');
		
	    $this->db->select('massubjob.subjob_code,empname,followupdoneat,nextreminderat,task_name,ac_name,trntask2.ac_code,
		trntask2.task_code,accmasaccounts.contactno,trntask2.remarks,trntask2.id,gstid,gstpwd,remindername,reminder_date,
		  accmasaccounts.group_code,clarificationremarks,clarificationreverse  ');
		  
	    $this->db->join('accmasaccounts', 'accmasaccounts.ac_code = trntask2.ac_code');
		$this->db->join('trntask1', 'trntask1.task_code = trntask2.task_code');
	    $this->db->join('trntask3', 'trntask3.id = trntask2.id','left');
	    $this->db->join('masreminder', 'trntask3.reminder_code = masreminder.reminder_code','left');
		$this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');
		$this->db->join('masemp', 'masemp.emp_code = trntask2.followupassignto','left');
	    $data['client'] = $this->db->get('trntask2')->result_array();
        $this->load->view('accounts/readyforbill',$data);	
	}
    
	public function savebill()

	{ 
	   
	   // $emp_code = $this->session->userdata('emp_code');
		 
		$task_code= $_POST['task_code'];
		$comp_id= $_POST['comp_id']; 
		$current_datetime=date("d-m-Y");	        			
       
      	if ($task_code)
			{
				$row = $this->db->query("SELECT MAX(bill_no) AS `maxid` FROM trnbilling1 where comp_id=$comp_id")->row();
				
		$qty= 1;
		$rate= $_POST['amount'];		 
		$taxableamt= $_POST['amount'];
		$taxper= $_POST['taxpergst'];
		
		$gsttaxper= $_POST['taxper'];
		
		
		$sgst= $_POST['sgst'];
		$roundoff= $_POST['roundoff'];
        $taxamt=0;
		$cgst= $_POST['cgst'];
		$taxamt=$sgst+$cgst;
        $id= $_POST['id'];
		
                $billno = $row->maxid+1; 
                $billdate=date("d-m-Y");
                $netval=$this->input->post("netval");				
				$comp_id=$this->input->post("comp_id");;
				$ac_code=$this->input->post("accode");
				$remarks=$this->input->post("remarks");
				
				//$nexttask=$this->input->post("nexttask");
				//$followupassignto=$this->input->post("followupassignto");
				$strSQL='';
				////////////////////////////////////////////
			//	$strSQL = "INSERT INTO trntask2 ";			
                       // $strSQL .="(task_code,ac_code) ";
                       // $strSQL .="VALUES ";
                       // $strSQL .="('".$nexttask."','".$ac_code."') ";
						
				        //$this->db->query($strSQL);
				///////////////////////////////////////////
					
					 $sql = "INSERT INTO trnbilling1 (comp_id,bill_no,bill_date,amount,taxamt,netval,roundoff,ac_code,remarks
				  ) VALUES ('" . $comp_id . "',
				  '" . $billno . "',
				  '" . $billdate . "',
				  '" . $rate . "',
				  '" . $taxamt . "',
				  '" . $netval . "',
				  '" . $roundoff . "',
				  '" . $ac_code . "',				 
				  '" . $remarks . "')";
					 
	             $this->db->query($sql); 
		 
                $strSQL ="update trntask2 set billed=1 where id='".$id."'";	
	             $this->db->query($strSQL);  
		
			    $sql = "INSERT INTO trnbilling2(comp_id,bill_no,bill_date,qty,rate,amount,sgst,cgst,gsttaxper,taxper,taxamt,totalamount,ac_code,pty_code,task_id,id
				  ) VALUES ('" . $comp_id . "',
				  '" . $billno . "',
				  '" . $billdate . "',
				  '" . $qty . "',
				  '" . $rate . "',
				  '" . $rate . "',
				  '" . $sgst. "',
				  '" . $cgst. "',
				  '" . $gsttaxper . "',
				  '" . $taxper. "',
				  '" . $taxamt. "',
				  '" . $netval. "',
				  '" . $ac_code. "',
				  '" . $ac_code. "',
				  '" . $task_code. "',				 
				  '" . $id. "')";
					  
	             $this->db->query($sql); 
	  }	
		
	}
	public function savebilledit()

	{  
		 
		$billno= $_POST['bill_no'];
		$comp_id= $_POST['comp_id']; 
		 
		$rate= $_POST['amount'];		 
		$taxableamt= $_POST['amount'];
		
		$gsttaxper= $_POST['gsttaxper'];
		$taxper= $_POST['taxper'];
		
        $taxamt=0;
		
		$sgst= $_POST['sgst'];
		$cgst= $_POST['cgst'];
		$taxamt=$sgst+$cgst;
        $roundoff= $_POST['roundoff'];  
                
        $netval=$this->input->post("netval");
		$remarks=$this->input->post("remarks");				
		
		$strSQL='';
	    
		$sql = " update trnbilling1 set amount='$rate',
									netval='$netval',
									taxamt='$taxamt',
									roundoff='$roundoff',
									remarks='$remarks' 
                where  comp_id ='$comp_id' and  bill_no ='$billno'";				 
	   $this->db->query($sql); 
		
		$sql = " update trnbilling2 set amount='$rate',
									sgst='$sgst',cgst='$cgst',
									gsttaxper='$gsttaxper',
                                    taxper='$taxper',									
									taxamt='$taxamt',
									totalamount='$netval'
                where  comp_id ='$comp_id' and  bill_no ='$billno'";				 
	   $this->db->query($sql);
		 
	}	
		
	 
	public function geteditbilling()
	{
		 
        $bill_no=$_POST["bill_no"];//
        $comp_id=$_POST["comp_id"]; 
			
	    $task_code=0; $task_name=''; $sac='';  $subjob_code=0; 
		 
		$row = $this->db->query("SELECT task_id from trnbilling2  where  bill_no=$bill_no and  comp_id=$comp_id   ")->row();
        if ($row)
			{
               $task_code= $row->task_id ;
			}
		
        $row = $this->db->query("SELECT task_name,trntask1.subjob_code,sac from trntask1 inner join massubjob 
                        on massubjob.subjob_code=trntask1.subjob_code where  task_code=$task_code  ")->row();
        if ($row)
			{
               $task_name= $row->task_name ;
			   $sac= $row->sac ;
			}	
        			
		$row = $this->db->query("SELECT amount,gsttaxper,taxper,sgst,cgst,taxamt,totalamount,task_id from trnbilling2 where bill_no=$bill_no and  comp_id=$comp_id  ")->row();
        if ($row)
			{
                   echo $sac."$".
			       $row->amount."$".
				   $row->gsttaxper."$".	
				   $row->taxper."$".				  
				   $row->sgst."$".
				   $row->cgst."$".
				   $row->taxamt."$".
				   $row->totalamount."$".
				   $row->task_id."$".
				   $task_code."$".
				   $task_name;
			}
			 
	}///////////////////////////////////////////////////////////geteditbilling	
	   
	   
	 public function getselect2taskold()

	  {
		 
		$echostr='';
		$selected=0;
        $subjobcode=$_POST["subjobcode"]; 
		$task_code=$_POST["task_code"]; 
	    $row = $this->db->query("SELECT task_code from trntask1  where subjob_code=$subjobcode and task_code=$task_code ")->row();
        if ($row)
			{
             $selected=$row->task_code+1;
			}
			 
       
		$previousCountry = null; 
		//$this->db->where('task_code',$id) ;
		
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
				
				//if($data->tin_number==$tin_no) {echo "selected";}
				 //echo "<script type='text/javascript'>alert('$selected');</script>"; 
				
	            $echostr.= "<option  value= '$airport->task_code'";	
                 if($selected==$airport->task_code){ 
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
			
        echo $echostr;
	   }//getselect2task		
	 
	 public function getbilling()

	  {
		 
        $id=$_POST["id"]; 
		$subjob_code=0; 
        $task_code=$_POST["task_code"]; 
       
	    $row = $this->db->query("SELECT  subjob_code from trntask1  where task_code=$task_code   ")->row();
        if ($row)
			{
				$subjob_code=$row->subjob_code;
			}
			
	    $row = $this->db->query("SELECT  sac,amount,taxper from massubjob  where subjob_code=$subjob_code   ")->row();
        if ($row)
			{
             echo $row->sac."$".$row->amount."$".$row->taxper;
			}
			 
	   }//getbilling
	   
	public function getaccbilling()

	  {
		 
        $vch_no=$_POST["vch_no"];
		 
	    $row = $this->db->query("SELECT  
		    abs(dr_amt) dramt,remarks,ac_code,comp_id,oppac_code,vch_dt from accentry  where vch_no=$vch_no  and vchid=1 ")->row();
        if ($row)
			{
             echo $row->dramt."$".$row->remarks."$".$row->ac_code."$".$row->comp_id."$".$row->oppac_code."$".$row->vch_dt;
			}
			 
	}//getaccbilling
	
	public function fillselect()
	{	
	    $task_code=60;// $_POST['task_code'];
         $this->db->where('task_code', '60'); 
       // $this->db->where('bill_no', $bill_no);  	        
		//$this->db->select('cgst,sgst,gsttaxper,totalamount,sac,rate,task_name,trnbilling2.amount,trnbilling2.taxper,
		//trnbilling2.taxamt,trnbilling2.task_id,trnbilling2.id');
       // $this->db->join('trntask1', 'trntask1.task_code = trnbilling2.task_id');		
       // $this->db->join('massubjob', 'massubjob.subjob_code = trntask1.subjob_code');			
	   // $data['client'] = $this->db->get('trnbilling2')->result_array();
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
  
 	   // $users_arr[] = array("task_code" => "1", "task_name" =>"test");
	   // $sql = "SELECT task_code,task_name FROM trntask1 WHERE task_code=".$task_code;
        //$result = mysqli_query($sql);
        //$users_arr = array();
       // while( $row = mysqli_fetch_array($result) ){
         //  $userid = $row['task_code'];
         //  $name = $row['task_name'];
         //  $users_arr[] = array("task_code" => $userid, "task_name" => $name);
        // }
      echo json_encode($users_arr);
		
	}	
		
	
}


