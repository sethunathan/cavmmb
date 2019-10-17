<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>subjob/newsubjob">
            <i class="fa fa-dashboard"></i> <span>New Job</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">JOB Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>JOB #</td>   
	<td>Name</td>	
    <td>Edit</td>	
  </tr>
  
<?php foreach ($client as $rsclient) : ?>  
  <tr>
    
    <td><?php echo $rsclient['subjobname'] ; ?></td>
    <td><?php echo $rsclient['details'] ; ?></td>    
<td>
	 
	<a href="<?php echo base_url(); ?>subjob/editsubjob/<?php echo $rsclient['subjob_code'];  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php endforeach ; ?>
</table>
<?php include 'bodyfooter.php';?>