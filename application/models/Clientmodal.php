<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clientmodal extends CI_Model{

    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('accmasaccounts');
        $this->db->order_by('ac_name','asc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
   function booktable($search){

        $query = $this
                ->db
                ->select('*')
                ->from('accmasaccounts')
                ->like('ac_name',$search)
                ->or_like('contactno',$search)
                ->get();
     
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
		
}
}