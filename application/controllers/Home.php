<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home/index');
	}
	public function aboutus()
	{
		$this->load->view('home/aboutus');
	}
	public function prod()
	{
		$this->load->view('home/prod');
	}
	public function services()
	{
		$this->load->view('home/services');
	}
	public function blog()
	{
		$this->load->view('home/blog');
	}
	public function contact()
	{
	    $this->db->where('comp_id', 1);
		$datauser= $this->db->get('msacompany');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['companyname']= $data['cuser']->company_name;
		$data['address1']= $data['cuser']->address1;
		$data['email']= $data['cuser']->email;
		$data['contactnos']= $data['cuser']->contactnos;		
		 
		$this->db->where('comp_id', 2);
		$datauser= $this->db->get('msacompany');	
	    foreach ($datauser->result() as $data['cuser']){};
	    $data['companyname2']= $data['cuser']->company_name;
		$data['address2']= $data['cuser']->address1;
		$data['email2']= $data['cuser']->email;
		$data['contactnos2']= $data['cuser']->contactnos;
		
		$this->load->view('home/contact',$data);
		//$this->load->view('home/contact');
	}
	
}
