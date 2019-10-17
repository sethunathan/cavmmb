<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlelogin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->library('session');
	$this->load->helper('url');
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
}
	
		
	public function login()
	{
	    $clientId = '411998643622-i1t7ne36aq2q2c10qhsv6069nqv5tdlh.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 'O_nmLUqHkwmy-jBdeNpthG0z'; //Google client secret
		$redirectURL = 'http://cavmmb.com/login';//base_url() .'login';
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();  
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}
		 
		
		 
		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			echo "<pre>";
			print_r($userProfile);
			die;
        } 
		else 
		{			
			$url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}	
}
