<?php include 'body.php';?>

<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>billing/outstanding>"
            <i class="fa fa-dashboard"></i> <span>Billing Outstanding - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>billing/outstanding" method="post">
 
 <br>
 
		 			 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="ac_code" name="ac_code">	
	     
        <option value="-1">All</option>	  
		<?php
			$branch_code=$this->session->userdata('branchcode');
            $this->db->where('group_code', $branch_code);	 		
            $this->db->order_by('ac_name');					
            $this->db->select('ac_name,ac_code');                      
            $castxe= $this->db->get('accmasaccounts');	 
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->ac_code'";     
				    echo ">$data->ac_name</option>";
				} 
		?>  
		</select>
      </div>
    </div>
	<br>
    <div class="form-group has-feedback"> 
     Start Date (Use Format dd/mm/yyyy): <input type="text" name="datepicker1" value= "<?php echo ($date1) ?>" id="datepicker1"><br></div>
    <div class="form-group has-feedback"> End Date (Use Format dd/mm/yyyy): <input type="text" name="datepicker2"  value= "<?php echo ($date2) ?>" id="datepicker2"><br></div>
	 <div class="col-xs-4">
	   
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
		 
 </form>
 
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> 
<textarea class ="message-box"  name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
 
 
 <div class="table-responsive">
<table      data-toggle="table"   width="100%" border="1" cellspacing="2" cellpadding="4" >
  <thead><tr>
    
    <th data-sortable="true">S.No </th> 
    <th data-field="name" data-sortable="true">Client Name</th>
	<th data-field="con" data-sortable="true">Contact No</th>
    <th data-field="opn" data-sortable="true">Opening Balance</th>
<th data-field="totdr" data-sortable="true">Debit Balance</th>
<th data-field="totcr" data-sortable="true">Cedit Balance</th>	
	<th data-field="task" data-sortable="true">Dr.Closing Balance</th>
		<th data-field="task1" data-sortable="true">Cr.Closing Balance</th>
		<th data-field="task2" data-sortable="true"> Closing Balance</th>
</tr></thead>
  
<?php $i=1;
$total=0;
 foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['ac_code'];?>" class="table-row">
	<td><?php echo $i; ?></td> 
    <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;"><?php echo $rsclient['ac_name'];?></td> 
	<td ><?php echo $rsclient['contactno']; ?></td> 
	<td ><?php $opnbal=$rsclient['opn_bal'];
	    if ($opnbal<0){ echo abs($rsclient['opn_bal']);}  
		else if ($opnbal>0){ echo abs($rsclient['opn_bal']);}  
	    ?></td> 
	<td ><?php $dramt=$rsclient['tot_dr'];if ($dramt<0){ echo abs($rsclient['tot_dr']).'';}  ?></td> 
	<td ><?php echo ($rsclient['tot_cr'].''); ?></td> 
	<td >
	   <?php 
	   $closbal=($rsclient['clos_bal']);

        $closbal=$rsclient['clos_bal'];
	    if ($closbal<0)
		{
			$closbal1=$closbal1+abs($rsclient['clos_bal']);
			echo abs($rsclient['clos_bal']);
		}  
		 $drtotal= $drtotal+($rsclient['tot_dr']);
		 $crtotal= $crtotal+($rsclient['tot_cr']);
		 
		 $total= $total+($rsclient['clos_bal']);
	?></td> 
	<td ><?php   $closbal=($rsclient['clos_bal']);

         $closbal=$rsclient['clos_bal'];
	     if ($closbal>0){ 
		 $closbal2=$closbal2+abs($rsclient['clos_bal']);
		 echo abs($rsclient['clos_bal']);
		 } 	
	     
		 $drtotal= $drtotal+($rsclient['tot_dr']);
		 $crtotal= $crtotal+($rsclient['tot_cr']);
		 
		 $total= $total+($rsclient['clos_bal']);
	?></td>
    <td >
	<?php
         $closbal=($rsclient['clos_bal']); 
         
	     if ($closbal<0){ echo abs($rsclient['clos_bal']) ;} 	
	     else if ($closbal>0){ echo abs($rsclient['clos_bal']) ;} 	
		 $drtotal= $drtotal+($rsclient['tot_dr']);
		 $crtotal= $crtotal+($rsclient['tot_cr']); 
		 $total= $total+($rsclient['clos_bal']);
	?></td>	
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
<tr>
<td></td><td></td><td></td><td></td>
<td><?php echo abs($drtotal);?></td>
<td><?php echo $crtotal;?></td>
<td><?php echo abs($closbal1)?></td>
<td><?php echo $closbal2;?></td>
<td><?php 

if ($total<0){ echo abs($total) ;}  
		else if ($total>0){ echo $total ;} 	
	     
;?></td>
</tr>
</table>
 
</div>

     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script script="javascript">
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.form-control').select2();
	$("#stage").select2();
});
</script>
 
	<script>
  $(function() {

    $( "#datepicker1" ).datepicker(
	{ dateFormat: 'dd-mm-yy' ,
	changeMonth: true,
      changeYear: true,
	 yearRange: '2015:2060',
	}
	).datepicker("setDate", "0");;
	
	$( "#datepicker2" ).datepicker(
	{ dateFormat: 'dd-mm-yy' ,	
	changeMonth: true,
      changeYear: true,
	yearRange: '2015:2060',
	}
	).datepicker("setDate", "0");;
  });
  </script>
<?php include 'bodyfooter.php';?>
  