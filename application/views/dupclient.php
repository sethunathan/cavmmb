<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script script="javascript">
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.sform-control').select2();
});
</script>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>others/">
            <i class="fa fa-dashboard"></i> <span>Combine Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
		
		 <form action="<?php echo base_url(); ?>others/combineclient" method="post">
<p class="login-box-msg">Client Name (Duplicate)</p>
 
		
	  
 	  <select class="sform-control" id="ac_code1" name="ac_code1">	
      <option value="">-</option>";	  
		<?php
			 	

                           $this->db->order_by('ac_name');
                            $this->db->select('ac_code,ac_name');                         
		                    $datauserr= $this->db->get('accmasaccounts');	
	                        foreach ($datauserr->result() as $dataa){
							
				    echo "<option value='$dataa->ac_code'";                  
				    echo ">$dataa->ac_name</option>";
				} 
		?>  
		</select>
		
		 
 <p class="login-box-msg">Client Name(Original )</p>
 
		 	
 	  <select class="sform-control" id="ac_code2" name="ac_code2">		
            <option value="">-</option>";	  	  
		<?php
			 	//select ac_name,pan from accmasaccounts where length(pan)<5 and group_code in(7,8) 	

                            $this->db->order_by('ac_name');
                            $this->db->select('ac_code,ac_name');                         
		                    $datauserr= $this->db->get('accmasaccounts');	
	                        foreach ($datauserr->result() as $dataa){
							
				    echo "<option value='$dataa->ac_code'";                  
				    echo ">$dataa->ac_name</option>";
				} 
		?>  
		</select>
		<br><br><br>
		
		      <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Combine</button>
		  
        </div>
		<br><br><br>
		
    </form>

<?php include 'bodyfooter.php';?>