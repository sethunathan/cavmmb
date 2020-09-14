<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB | Billing Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnEditAction1{background-color:#2FC332;border:0;padding:2px 10px;color:yellow;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
.btnDeleteAction{background-color:green;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;} 
</style>
  <style>
 .register-boxx {
    width: 90%;
    margin: 7% auto;
}
</style>



  
  </head>

<body style="background: burlywood" class="hold-transition register-page">
 
 <div class="register-boxx">
 <div class="register-logo">
    <button type="button" id="main"  class="btnDeleteAction" ><a href="<?php echo base_url(); ?>billing/billingnew"><b>Add New</b></a></button> 
</div>

  <div class="register-logo">
    <button type="button" id="main"  class="btnDeleteAction" ><a href="<?php echo base_url(); ?>admin/main"><b>Main Screen</b></a></button> 
</div>



   <div class="mainscreen"  >
    	
   <div class="form-group">
   
    <form id="rock" action="<?php echo base_url();?>billing/modifybill" method="post" enctype="multipart/form-data">  
			<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
			<div class="form-group has-feedback"> 
             Start Date: <input type="text" name="datepicker1" value= "<?php echo ($date1) ?>" id="datepicker1">
             End Date: <input type="text" name="datepicker2"  value= "<?php echo ($date2) ?>" id="datepicker2"> 
			</div>
    <div class="col-sm-3">
	<select  class="form-control"  style="width: 100%" id="yearidd" name="yearidd">		 
	<?php
		
		$this->db->select('year_id,yearname');   
		$this->db->order_by('year_id','desc');  
		//$this->db->where_in('group_code', $names);	 
		$castxe= $this->db->get('masyearr');	
		$row = mysqli_fetch_row($result);
		foreach($castxe->result() as $data)
		 {
		   echo "<option value= '$data->year_id'";
		   echo ">$data->yearname</option>";
		  } 
		  ?>  
</select>

<td> 
	 <?php
			 		
            $this->db->order_by('comp_id');					
            $this->db->select('comp_id,comp_name');                      
            $castxe= $this->db->get('mascompany');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<input type='radio' name='comp_idd'   readonly id='$data->comp_id'   value='$data->comp_id'";
					if ($data->comp_id==2){ echo "checked";}
				    echo ">$data->comp_name</input>";					
				} 
		?> 	 


 
</div>
	<div class="col-sm-2">	 
      <input  class="btnDeleteAction" type="submit" class="btn" value="Load"/>
    </div>
	<div class="col-sm-2">
	   <textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
	</div>
 </form>	
</div>

<div class="col-sm-10">  
		<div class="table-responsive">
		<table id="acc" class="table">
		  <tr class="AdminTableHeader">
			<td>S.No </td>
			<td>Voucher No</td>  		
			<td>Date</td>  	
			<td>Ac Name</td> 
			<td>Amount</td>
			<td>Remarks</td> 
			<td>Edit</td>
			<td>Delete**</td>
            <td>Print</td>			
		  </tr>
		  
		<?php $i=1; foreach($records->result() as $row)
		 { 
			$id=$row->bill_no;
		 ?>  
			<tr id="message_<?php echo $i;?>" class="table-row">
			<td><?php echo $i; ?></td>  
			<td><?php $str=$row->bill_no;

if ($row->comp_id==1)
{
	$str= $row->bill_no.'-'.$row->billnoprint	;
}
  
			
echo $str	?></td>   
			<td><?php echo date("d/m/Y g:i A", strtotime($row->bill_date));?></td>   	
			<td id="acname<?php echo $i;?>"><?php echo $row->comp_id.'-'.$row->ac_name; ?></td>
			<td id="amount<?php echo $i;?>"><?php echo $row->netval;  ?></td> 
	    	<td id="remarks<?php echo $i;?>"> <?php echo $row->remarks;  ?></td> 
			<td><a href="<?php echo base_url(); ?>billing/billedit/<?php echo $row->bill_no.'/'.$row->comp_id.'/'.$row->yearid;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	</td>
			<td><a href="<?php echo base_url(); ?>billing/delete/<?php echo $row->bill_no.'/'.$row->comp_id.'/'.$row->yearid;  ?>"><button class="btn btn-primary" type="button">Delete**</button></a>	</td>
			<td><a 
			    target="_blank" href="<?php echo base_url(); ?>billing/billprint/<?php echo $row->bill_no.'/'.$row->comp_id.'/'.$row->pty_code.'/'.$row->yearid;  ?>">
			  <button class="btn btn-primary" type="button">Print</button></a>	</td>
		  </tr> 
		  <?php $i=$i+1; ?>
			
		 <?php } ?>
		</table> 
		</div>
</div>
 </form>
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
 