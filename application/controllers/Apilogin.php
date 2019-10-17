<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//vmmbcapdm@gmail.com//thirivasagam12
class Apilogin extends CI_Controller {
	function __construct()
    {
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct();
        $this->load->helper('url');       
        
    }
	 
   
	public function index()

	{
	    $response = array("error" => FALSE);
	    if (isset($_POST['email']) && isset($_POST['password'])) {
 
        // receiving the post params
        $email = $_POST['email'];
        $password = $_POST['password'];
 
        // get the user by email and password
      // $user = $db->getUserByEmailAndPassword($email, $password);
 
   /// if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["uid"] = "sethu";//$user["unique_id"];
        $response["user"]["name"] = "sethu";//$user["name"];
        $response["user"]["email"] ="sethu"; //$user["email"];
        $response["user"]["created_at"] = "sethu";//$user["created_at"];
        $response["user"]["updated_at"] ="sethu";// $user["updated_at"];
    //    echo json_encode($response);
   // } else {
        // user is not found with the credentials
       // $response["error"] = TRUE;
      //  $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    //}
    }
	else
 		{
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
    }
	}
	
	
	
	}