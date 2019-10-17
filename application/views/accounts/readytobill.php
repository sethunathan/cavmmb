<?php include 'body.php';?> 
   
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 
<div class="form-group has-feedback">
       	    <div class="txt-heading" >Customer List
 
	 
<div class="container">
 
<div class="row">
<div class="form-group">

 <form action="<?php echo base_url(); ?>billing/newbill" method="post">       

   Company Under
  <select   id="comp_id"    name='comp_id' >

<?php
	$this->db->order_by('company_name'); 
	$this->db->select('comp_id,company_name');	  
    $castxe= $this->db->get('mascompany');	 
	$i=0;
	     foreach ($castxe->result() as $airport)
			{            
                      
	            echo "<option  value='$airport->comp_id'>$airport->company_name </option>"; 
                      
			}
                       
?>
 </select>	
 <br>
    Billing Under
 
<select   id="ac_code"    name='ac_code'>
<?php
    $branch_code=$this->session->userdata('branchcode');	 
	$this->db->where('accmasaccounts.group_code', $branch_code);     	   
	$this->db->order_by('ac_name');  
    $this->db->group_by('accmasaccounts.ac_code,ac_name');	
	$this->db->select('accmasaccounts.ac_code,ac_name');	
    $castxe= $this->db->get('accmasaccounts');	 
	    foreach ($castxe->result() as $airport)
			{            
                      
	            echo "<option  value='$airport->ac_code'>$airport->ac_name </option>"; 
                      
			}
?>
 </select>	
<?php 
  
    $branch_code=$this->session->userdata('branchcode');	 
	$this->db->where('movetotask',4); 
	$this->db->where('billed', 0);		  	
    $this->db->where('accmasaccounts.group_code', $branch_code);     	   
	$this->db->order_by('ac_name');  
    $this->db->group_by('accmasaccounts.ac_code,ac_name');	
	$this->db->select('accmasaccounts.ac_code,ac_name');
	$this->db->join('trntask2', 'trntask2.ac_code = accmasaccounts.ac_code'); 	   
    $castxe= $this->db->get('accmasaccounts');	 
	$i=0;
        foreach ($castxe->result() as $airport)
			{
                            $ac_name=substr($airport->ac_name,0,100);
					        echo "<label class='col-md-4'  >";			
	                        echo "<input type='checkbox'   name='accode[]'  value= '$airport->ac_code'";
				            echo ">$ac_name</input>"; 
							echo "</label>";
							echo ' <br>';                            
							$i=$i+1;
			}
                        
?>
</div>
</div>
</div>

		 
	 
	  </div>
	  </div>
	  
	   <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Create</button>
		  
        </div>
</form>	  
	  	   
 
 

<?php include 'bodyfooter.php';?>
  