<?php include 'body.php';?>
<a target="_blank" href="<?php echo base_url(); ?>test/printmaster"  class="btn btn-block btn-success">
<span class="glyphicon glyphicon-off"></span>Print Master</a>
 
 <a target="_blank" href="<?php echo base_url(); ?>test/printvoucher"  class="btn btn-block btn-success">
<span class="glyphicon glyphicon-off"></span>Print Voucher</a>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>test/viewclient">
            <i class="fa fa-dashboard"></i> <span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">Master Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>#</td>   
	<td>Ac Name</td>	
    <td>Group</td>	
  </tr>
  
<?php $i=1;foreach ($client as $rsclient) : ?>  
  <tr>
      <td><?php echo $i;   ?></td>
    <td><?php echo $rsclient['acname'] ; ?></td>
    <td><?php echo $rsclient['groupname'] ; ?></td>    
 
  </tr>
<?php $i=$i+1; endforeach ; ?>
</table>

<p class="login-box-msg">Voucher Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>#</td>   
	<td>Ac Name</td>	
    <td>Group</td>	
  </tr>
  
<?php $i=1;foreach ($voucher as $rsclient) : ?>  
  <tr>
      <td><?php echo $i;   ?></td>
    <td><?php echo $rsclient['id'] ; ?></td>
    <td><?php echo $rsclient['trn_date'] ; ?></td>    
 
  </tr>
<?php $i=$i+1; endforeach ; ?>
</table>

<?php include 'bodyfooter.php';?>