<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>">
            
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">Task Details </p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>S.No</td>   
    <td>Client </td> 
    <td>Task</td>	
    <td>Service </td>
	<td>Assign To </td>
    <td>Starting Date </td>
     <td>Ending Date </td>
  </tr>
  
<?php $i=1;foreach ($showdetail as $rsclient) : ?>  
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $rsclient['ac_name'].'-'.$rsclient['group_code'] ; ?></td> 
  <td><?php echo $rsclient['task_name'].'-'.$rsclient['task_code']; ?></td>   
 <td><?php echo $rsclient['subjobname'] ; ?></td>
 <td><?php echo $rsclient['followupassignto'] ; ?></td>
 <td><?php echo $rsclient['starting_date'] ; ?></td>
 <td><?php echo $rsclient['ending_date'] ; ?></td>
 
 
  </tr>
<?php $i=$i+1;endforeach ; ?>
</table>
<?php include 'bodyfooter.php';?>