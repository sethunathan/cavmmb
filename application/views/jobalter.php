<?php include 'body.php';?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>job/jobnew">
            <i class="fa fa-dashboard"></i> <span>New Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">Service Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>Service #</td>   
	<td>Name</td>
    <td>S.A.C.</td>
	<td>Tax %</td>
	<td>Amount</td>	
	<td>Child</td>
    <td>Edit</td>	
  </tr>
  
 
<?php $i=1;foreach ($results as $data) : ?>  
  <tr>
    
    <td><?php echo $i; ?></td>
    <td><?php echo $data->subjobname  ; ?></td> 
    <td><?php echo $data->sac; ?></td> 
    <td><?php echo $data->taxper  ; ?></td> 
    <td><?php echo $data->amount  ; ?></td>  
	<td class="span6">
	<select class="form-control" id="select_<?php echo $data->subjob_code;?>" name="task">	
		 <?php
			 		
            $this->db->order_by('subjobname');
            $this->db->where('activee',1); 			
            $this->db->select('subjobname,subjob_code');                      
            $castxe= $this->db->get('massubjob');	
		    foreach($castxe->result() as $dataa)
				{
				    echo "<option value='$dataa->subjob_code'";  
                     if( $data->childsubjob_code==$dataa->subjob_code)	{echo "selected";}				
				    echo ">$dataa->subjobname</option>";
				} 
		?>   
   </select>
	<Button id="button_<?php echo $data->subjob_code;?>"  class="btn btn-primary" name="reverse"
	     onclick="saveentry('<?php  echo $data->subjob_code; ?>')"> Assingn</Button>
       	<?php  
		?>
		 
			
	</td>  
    <td>
	    <a href="<?php echo base_url(); ?>job/jobedit/<?php echo $data->subjob_code;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
    </td>
  </tr>
<?php $i=$i+1; endforeach ; ?>
</table>
<ul class="pagination">
<p><?php echo $links; ?></p>
</ul>

 <script>
function saveentry(id) { 
	$childsubjob_code=$('#select_'+id).val();	
	 
	$.ajax({
		url: '<?php echo site_url("job/saveentry")?>',
		type: "POST",
		data:'childsubjob_code='+$childsubjob_code+'&subjob_code='+id,		
		success: function(data){
			        alert(data);
                   		   
	 		
		},
	error: function (request, status, error) {
        alert(request.responseText);
    }
    //$("#loaderIcon").hide();    
   }); 
}
</script>
<?php include 'bodyfooter.php';?>