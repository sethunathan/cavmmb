<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>emp/newemp">
            <i class="fa fa-dashboard"></i> <span>New Emp</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">EMPLOYEE Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>Emp #</td>   
	<td>Name</td>
    <td>User Name</td>	
    <td>Password </td>
	<td>Address </td>
<td>Contact No </td>
<td>E-Mail</td>		
    <td>Edit</td>	
  </tr>
  
<?php foreach ($client as $rsclient) : ?>  
  <tr>
    
    <td><?php echo $rsclient['emp_code'] ; ?></td>
    <td><?php echo $rsclient['empname'] ; ?></td>
	
     <td><?php echo $rsclient['username'] ; ?></td>   
 <td><?php echo $rsclient['password'] ; ?></td>   
 <td><?php echo $rsclient['address'] ; ?></td>   
 <td><?php echo $rsclient['contactno'] ; ?></td>
<td><?php echo $rsclient['email'] ; ?></td>  
<td>
	 
	<a href="<?php echo base_url(); ?>emp/editemp/<?php echo $rsclient['emp_code'];  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php endforeach ; ?>
</table>
<?php include 'bodyfooter.php';?>