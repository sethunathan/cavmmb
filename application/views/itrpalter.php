<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>itsetup/newitr">
            <i class="fa fa-dashboard"></i> <span>New ITR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">ITR Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>ITR #</td> 
    <td>ITR Year</td>  	
	<td>ITR</td>	
    <td>Edit</td>	
  </tr>
  
<?php foreach ($client as $rsclient) : ?>  
  <tr>
    
    <td><?php echo $rsclient['itr_code'] ; ?></td>
    <td><?php echo $rsclient['itryear'] ; ?></td>  
     <td><?php echo $rsclient['itrname'] ; ?></td>   	
<td>
	 
	<a href="<?php echo base_url(); ?>itsetup/edititr/<?php echo $rsclient['itr_code'];  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php endforeach ; ?>
</table>
<?php include 'bodyfooter.php';?>