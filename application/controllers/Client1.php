<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Client1 extends CI_Controller {
    
    function __construct() {
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        parent::__construct(); 
		$this->load->model('clientmodal');
        $this->load->library('Ajax_pagination');
        $this->perPage = 3;
    }
    public function ajaxsearch()
    {
      
       if(is_null($this->input->get('id')))
        {

        $this->load->view('input');    
		
        
        }
        else
        {
       // $this->load->model('Bookmodel'); 
        
        $data['booktable']=$this->clientmodal->booktable($this->input->get('id')); 
        
        $this->load->view('client1',$data);
              echo "<script>
 alert('$id');

 </script>";
        }
        
       
    }
    public function index(){
        $data = array();
        
        //total rows count
        $totalRec = count($this->clientmodal->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'client1/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['client1'] = $this->clientmodal->getRows(array('limit'=>$this->perPage));
        
        //load the view
		$this->load->view('input');  
        $this->load->view('client1', $data);
    }
    
    function ajaxPaginationData(){
        echo $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
      //  echo "<script>
//alert('$page');

//</script>";
//window.location.href='admin/ahm/panel';
        //total rows count
        $totalRec = count($this->clientmodal->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'client1/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['client1'] = $this->clientmodal->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('ajax_pagination_view', $data, false);
    }
}