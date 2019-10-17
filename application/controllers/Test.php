<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct() {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
         $this->load->library('excel');
	    $this->load->library('session');	  
        $this->load->helper('url');
		$this->load->library("pagination");
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
}		function xml_add_child($parent, $name, $value = NULL, $cdata = FALSE)
	{
		if($parent->ownerDocument != "")
		{
			$dom = $parent->ownerDocument;			
		}
		else
		{
			$dom = $parent;
		}
		
		$child = $dom->createElement($name);		
		$parent->appendChild($child);
		
		if($value != NULL)
		{
			if ($cdata)
			{
				$child->appendChild($dom->createCdataSection($value));
			}
			else
			{
				$child->appendChild($dom->createTextNode($value));
			}
		}
		
		return $child;		
	}
 
   public function printmaster()
   {
	   $dom = new DOMDocument('1.0');
	  
     $ENVELOPE = $this->xml_add_child($dom, 'ENVELOPE');
	     $HEADER=$this->xml_add_child($ENVELOPE, 'HEADER');
          $this->xml_add_child($HEADER, 'VERSION', '1');
	      $this->xml_add_child($HEADER, 'TALLYREQUEST', 'IMPORT');
		  $this->xml_add_child($HEADER, 'TYPE', 'DATA');
		  $this->xml_add_child($HEADER, 'ID', 'Masters');
		  $BODY=$this->xml_add_child($ENVELOPE, 'BODY');
		  
		  $DESC=$this->xml_add_child($BODY, 'DESC');
		  $STATICVARIABLES=$this->xml_add_child($DESC, 'STATICVARIABLES');
	            $this->xml_add_child($STATICVARIABLES, 'IMPORTDUPS', '@@DUPCOMBINE');  
				
		 $DATA=$this->xml_add_child($BODY, 'DATA');	
		    $TALLYMESSAGE=$this->xml_add_child($DATA, 'TALLYMESSAGE');
			
			    $res = $this->db->query('select acname,groupname from master order by acname');
		        foreach($res->result() as $item) {
			      $LEDGER=$this->xml_add_child($TALLYMESSAGE, 'LEDGER');
			          $this->xml_add_attribute($LEDGER, 'NAME', $item->acname);
					  $this->xml_add_attribute($LEDGER, 'Action', 'Create');
				     
					 $this->xml_add_child($LEDGER, 'NAME', 'Carton Sales');
				     $this->xml_add_child($LEDGER,'PARENT', $item->groupname);
			   }
	
    $domM=$this->xml_print($dom,TRUE); 
    $data['client']=$domM;
    $this->load->view('test1',$data);
 
       
   }
    public function printvoucher()
   {
	   $dom = new DOMDocument('1.0');
	  
     $ENVELOPE = $this->xml_add_child($dom, 'ENVELOPE');
	     $HEADER=$this->xml_add_child($ENVELOPE, 'HEADER');
          $this->xml_add_child($HEADER, 'VERSION', '1');
	      $this->xml_add_child($HEADER, 'TALLYREQUEST', 'IMPORT');
		  $this->xml_add_child($HEADER, 'TYPE', 'DATA');
		  $this->xml_add_child($HEADER, 'ID', 'Vouchers');
		  $BODY=$this->xml_add_child($ENVELOPE, 'BODY');
		  
		  $DESC=$this->xml_add_child($BODY, 'DESC');
		  $DATA=$this->xml_add_child($BODY, 'DATA');	
		    $TALLYMESSAGE=$this->xml_add_child($DATA, 'TALLYMESSAGE');
			
			    $res = $this->db->query('select trn_date,id,remarks,remarks1,remarks2,dr,cr from voucher order by trn_date');
		        foreach($res->result() as $item) {
			      $VOUCHER=$this->xml_add_child($TALLYMESSAGE, 'VOUCHER');
			          $this->xml_add_attribute($VOUCHER, 'VCHTYPE','Sales');
					  $this->xml_add_attribute($VOUCHER, 'Action', 'Create');
					  $this->xml_add_attribute($VOUCHER, 'OBJVIEW', 'Accounting Voucher View');
				    
					       
				    	$datee= $item->trn_date;
						$datee=  date("d-m-Y", strtotime($datee) );
                       $this->xml_add_child($VOUCHER,'DATE',$datee);
					 
					 $this->xml_add_child($VOUCHER, 'VOUCHERTYPENAME', 'Sales');
				     $this->xml_add_child($VOUCHER, 'VOUCHERNUMBER', $item->id);
					 $this->xml_add_child($VOUCHER, 'REFERENCE', $item->id);
					 $this->xml_add_child($VOUCHER, 'PARTYLEDGERNAME', $item->remarks1);
					 $this->xml_add_child($VOUCHER, 'AMOUNT', $item->dr);
					  
					 
					 
			   }
	
    $domM=$this->xml_print($dom,TRUE); 
	
    $data['client']=$domM;
    $this->load->view('test1',$data);
 
       
   }
   public function testmaster()
   {
	   
//if(count($_POST)) {
	
	//$group_name = strtoupper($_POST['group_name']);
	//$item_name = $_POST['item_name'];
	//$opening_balance = $_POST['opening_balance'];
	//$opening_value = $_POST['opening_value'];
	//$opening_rate = $opening_value * $opening_balance;
	
	$res_str =<<<XML
<ENVELOPE>
	<HEADER>
		<VERSION>1</VERSION>
		<TALLYREQUEST>Import</TALLYREQUEST>
		<TYPE>Data</TYPE>
		<ID>Masters</ID>
	</HEADER>
	<BODY>
		<DESC>
			<STATICVARIABLES>
				<IMPORTDUPS>@@DUPCOMBINE</IMPORTDUPS>
			</STATICVARIABLES>
		</DESC>
		<DATA>
			<TALLYMESSAGE>
				<LEDGER NAME="Carton Sales" Action="Create">
					<NAME>Carton Sales</NAME>
					<PARENT>Sales Accounts</PARENT>
				</LEDGER>
				<LEDGER NAME="Freight Charges" Action="Create">
					<NAME>Freight Charges</NAME>
					<PARENT>Direct Expenses</PARENT>
				</LEDGER>
				<LEDGER NAME="Material Purchase" Action="Create">
					<NAME>Material Purchase</NAME>
					<PARENT>Purchase Accounts</PARENT>
				</LEDGER>
				<STOCKITEM NAME="Packing Materials" Action="Create">
					<NAME>Packing Materials</NAME>
					<PARENT>Primary</PARENT>
				</STOCKITEM>
				<LEDGER NAME="Output VAT @ 5% Tn" Action="Create">
					<NAME>Output VAT @ 5% Tn</NAME>
					<PARENT>Duties &amp; Taxes</PARENT>
				</LEDGER>
				<LEDGER NAME="Output VAT @ 14.5% Tn" Action="Create">
					<NAME>Output VAT @ 14.5% Tn</NAME>
					<PARENT>Duties &amp; Taxes</PARENT>
				</LEDGER>
				<LEDGER NAME="Akshera Papers" Action="Create">
					<NAME>Akshera Papers</NAME>
					<PARENT>Sundry Debtors</PARENT>
					<BILLCREDITPERIOD></BILLCREDITPERIOD>
					<ISBILLWISEON>YES</ISBILLWISEON>
					<INCOMETAXNUMBER></INCOMETAXNUMBER>
					<ADDRESS>--</ADDRESS>
					<ADDRESS1>-</ADDRESS1>
				</LEDGER>
				<LEDGER NAME="Andal Paper Mills" Action="Create">
					<NAME>Andal Paper Mills</NAME>
					<PARENT>Sundry Creditors</PARENT>
					<INCOMETAXNUMBER></INCOMETAXNUMBER>
					<ADDRESS>--</ADDRESS>
					<ADDRESS1>-</ADDRESS1>
				</LEDGER>
				<LEDGER NAME="Clarient Enterprises" Action="Create">
					<NAME>Clarient Enterprises</NAME>
					<PARENT>Sundry Creditors</PARENT>
					<INCOMETAXNUMBER></INCOMETAXNUMBER>
					<ADDRESS>--</ADDRESS>
					<ADDRESS1>-</ADDRESS1>
				</LEDGER>
				<LEDGER NAME="Nidhan Agencies" Action="Create">
					<NAME>Nidhan Agencies</NAME>
					<PARENT>Sundry Creditors</PARENT>
					<INCOMETAXNUMBER>33622403168</INCOMETAXNUMBER>
					<ADDRESS>-73/1,RADHA COMPLEX,UTHUKULIROAD,-PALAYAKADU, TIRUPPUR-641 601</ADDRESS>
					<ADDRESS1>9342217227,9025057227-9342217227,9025057227</ADDRESS1>
				</LEDGER>
				<LEDGER NAME="Sevana Adhesives" Action="Create">
					<NAME>Sevana Adhesives</NAME>
					<PARENT>Sundry Creditors</PARENT>
					<INCOMETAXNUMBER>33716245822</INCOMETAXNUMBER>
					<ADDRESS>-4/245-</ADDRESS>
					<ADDRESS1>-</ADDRESS1>
				</LEDGER>
				<LEDGER NAME="Sri Andal Paper Mills(p)ltd" Action="Create">
					<NAME>Sri Andal Paper Mills(p)ltd</NAME>
					<PARENT>Sundry Creditors</PARENT>
					<INCOMETAXNUMBER>33642981471</INCOMETAXNUMBER>
					<ADDRESS>-SF.NO:544/1,PUTHUKKADU-SATHYAMANGALAM. 638 451</ADDRESS>
					<ADDRESS1>-</ADDRESS1>
				</LEDGER>
				<LEDGER NAME="Sri Krishna Papers" Action="Create">
					<NAME>Sri Krishna Papers</NAME>
					<PARENT>Sundry Creditors</PARENT>
					<INCOMETAXNUMBER>33522504588</INCOMETAXNUMBER>
					<ADDRESS>-NO.12.NARAYANASWAMY NAGAR-TIRUPPUR-7</ADDRESS>
					<ADDRESS1>9843144300-9843144300</ADDRESS1>
				</LEDGER>
			</TALLYMESSAGE>
		</DATA>
	</BODY>
</ENVELOPE>

XML;
	
	//var_dump($res_str);die;
	
	$url = "http://localhost:9000/";
        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
// Following line is compulsary to add as it is:
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "xmlRequest=" . $res_str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
		
		if(curl_errno($ch)){
			var_dump($data);
		} else {
			$msg = 'Data successfully inserted into tally.';
		}
        curl_close($ch);
		
		
//}
   }
   
   
   
   public function index()
	{
		$this->load->view('test');
	}
	public function ins()
	{
	 
     if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
        $allowedExtensions = array("xls","xlsx");
        $ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
        if(in_array($ext, $allowedExtensions)) {
           $file_size = $_FILES['uploadFile']['size'] / 1024;
           if($file_size < 50) {
               $file = "uploads/".$_FILES['uploadFile']['name'];
               $isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
               if($isUploaded) {
                    //include("db.php");
                   // include("Classes/PHPExcel/IOFactory.php");
                    try {
                        //Load the excel(.xls/.xlsx) file
                        $objPHPExcel = PHPExcel_IOFactory::load($file);
                    } catch (Exception $e) {
                         die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
                    }
                    $sheet = $objPHPExcel->getSheet(0); 

					
                    $total_rows = $sheet->getHighestRow();              
                    $total_columns = $sheet->getHighestColumn();                          
                    echo '<h4>Data from excel file</h4>';
					$strSQL = "delete from  master ";
			        $this->db->query($strSQL);
                  //  echo '<table cellpadding="5" cellspacing="1" border="1" class="responsive">';
                    //Loop through each row of the worksheet
					// $query = "insert into `user_details` (`groupname`, `acname`) VALUES ";
                    for($row =2; $row <= $total_rows; $row++) {
                        //Read a single row of data and store it as a array.
                        //This line of code selects range of the cells like A1:D1
                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
                      //  echo "<tr>";
						$groupname='';
						$acname='';
                        foreach($single_row[0] as $key=>$value) {
							if ($key==0)
							{
								$groupname=$value;
							//	$value = date($format = "d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($value)); 
							//	echo "<td>".$value."</td>";
							}
							if ($key==1)
							{
								$acname=$value;
							//	$value = date($format = "d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($value)); 
							//	echo "<td>".$value."</td>";
							}
							 
							  
                            						
                        } 
						if ($groupname){
                        $strSQL = "INSERT INTO master ";			
                              $strSQL .="(groupname,acname) ";
                              $strSQL .="VALUES ";
                              $strSQL .="('".$groupname."','".$acname."') ";	          
			                   $this->db->query($strSQL);	
						}
						//	echo "<td>".$value."</td>";						
                       // echo "</tr>";
                    }
					
	//--------------------------------------------------------VOUCHER-----------------------------------------------------	
	                $sheet = $objPHPExcel->getSheet(1); 
                    $total_rows = $sheet->getHighestRow();              
                    $total_columns = $sheet->getHighestColumn();                          
                    echo '<h4>Data from voucher file</h4>';
					$strSQL = "delete from  voucher ";
			        $this->db->query($strSQL);
                   // echo '<table cellpadding="5" cellspacing="1" border="1" class="responsive">';
                    //Loop through each row of the worksheet
					 
                    for($row =2; $row <= $total_rows; $row++) {
                        //Read a single row of data and store it as a array.
                        //This line of code selects range of the cells like A1:D1
                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
                       //  echo "<tr>";
						$trn_date='';
						$remarks='';$remarks1='';$remarks2='';$dr='';$cr='';
                        foreach($single_row[0] as $key=>$value) {
							if ($key==0)
							{
								$trn_date = date($format = "d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($value)); 
							 //	echo "<td>".$trn_date."</td>";
							}
							if ($key==1)$remarks=$value;							
							if ($key==2)$remarks1=$value;							
							if ($key==3) $remarks2=$value;
							if ($key==4) $dr=$value;
							if ($key==3) $cr=$value;  
                            						
                        } 
						if ($trn_date){
                        $strSQL = "INSERT INTO voucher ";			
                              $strSQL .="(trn_date,remarks,remarks1,remarks2,dr,cr) ";
                              $strSQL .="VALUES ";
                              $strSQL .="('".$trn_date."','".$remarks."','".$remarks1."',
							  '".$remarks2."','".$dr."','".$dr."') ";	          
			                   $this->db->query($strSQL);	
						}
						 //	echo "<td>".$value."</td>";						
                      //  echo "</tr>";
                    }
    //-------------------------------------------------------VOUCHER------------------------------------------------------				
                    unlink($file);
                } else {
                    echo '<span class="msg">File not uploaded!</span>';
                }
            } else {
                echo '<span class="msg">Maximum file size should not cross 50 KB on size!</span>';	
            }
        }
		else {
            echo '<span class="msg">This type of file not allowed!</span>';
        }
    }
      $this->db->order_by('acname');
	  $data['client'] = $this->db->get('master')->result_array();
	  
	  $this->db->order_by('trn_date');
	  $data['voucher'] = $this->db->get('voucher')->result_array();
	  
      $this->load->view('viewclient',$data);
	  
	  
	} // ins()
	public function viewclient() {		   
		$this->db->order_by('acname');
	   $data['client'] = $this->db->get('master')->result_array();        
		$this->load->view("viewclient", $data);
        
    }
     public function get_mysqli()
	 { 
         $db = (array)get_instance()->db;
         return mysqli_connect('localhost', $db['username'], $db['password'], $db['database']);
	}
	
	
	
	
	
	
	
	
	
	
	//---------------------------------------------







	function xml_add_attribute($node, $name, $value = NULL)
	{
		$dom = $node->ownerDocument;			
		
		$attribute = $dom->createAttribute($name);
		$node->appendChild($attribute);
		
		if($value != NULL)
		{
			$attribute_value = $dom->createTextNode($value);
			$attribute->appendChild($attribute_value);
		}
		
		return $node;
	}

	function xml_print($dom, $return = FALSE)
	{
		 $this->output->set_content_type('text/xml');
		$dom->formatOutput = TRUE;
		$xml = $dom->saveXML();
		if ($return)
		{
			return $xml;
		}
		else
		{
			echo $xml;
		}
	}

	///--------------------------------------------
    
}//dnt


 