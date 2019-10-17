<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {
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
	public function index()

	{
	  $this->db->order_by('checklist_code', 'desc');
	  $data['client'] = $this->db->get('massubjob')->result_array();
      $this->load->view('checklisr',$data);	
	}
	public function add()
	{
		$strSQL= "INSERT INTO toy(name, code, category, price, stock_count) 
	     	VALUES('".$_POST["name"]."','".$_POST["code"]."','".$_POST["category"]."',
	    	'".$_POST["price"]."','".$_POST["stock_count"]."')";
	    $result=$this->db->query($strSQL);  if (!$result) {    die(mysql_error());}echo "Sucessfully Updated";
	
	}
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	function delete()
	{
        if(!empty($_GET["id"])) {
	         $result = mysql_query("DELETE FROM toy WHERE id=".$_GET["id"]);
            }
	}		
	
	}
 
?>