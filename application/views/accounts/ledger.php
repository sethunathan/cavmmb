<?php  include 'body.php';?>
 
<div class="entryscreen" >
	

	<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-8">
		
			<div class="form-group has-feedback"> <button type="button" id="main"  class="btnDeleteAction" >Back</button> </div>
    <form action="<?php echo base_url();?>accounts/ledger" method="post" enctype="multipart/form-data">
	
    <div class="form-group has-feedback"> 
    	 Select A.c Name:<select id ="accountname" class="form-control" name="accountname"> 
		<option  value="Select" selected>தேர்வு செய்யவும்</option>				
		<?php            		            
				$this->db->select('ac_name,ac_code');						
			 	$admin = $this->session->userdata('admin');
		        if ($admin==1)
		        {
			
		        }
                 else if ($admin==0)
		        {				
				     $branchcode = $this->session->userdata('branchcode');
				    $this->db->where('group_code', $branchcode);
				}				 
				$this->db->order_by('ac_name'); 		
				$castxe= $this->db->get('accmasaccounts');		
				$row = mysqli_fetch_row($result);			
				foreach($castxe->result() as $data)				
					{									
					    $str=ucwords($data->ac_name);
						echo "<option value= '$data->ac_code'";   
						if($accname==$data->ac_code) {echo "selected";}	
						echo "><font size='5' color='red'>$str</font></option>";
					}  							
		?>   					
		</select>				
	</div>
	<div class="form-group has-feedback"> 
     Start Date: <input type="text" name="datepicker1" value= "<?php echo ($date1) ?>" id="datepicker1"><br></div>
    <div class="form-group has-feedback"> End Date: <input type="text" name="datepicker2"  value= "<?php echo ($date2) ?>" id="datepicker2"><br></div>
	
	<div class="col-xs-4"><input class="btn btn-primary"  type="submit" class="btn" value="Load"/>
	</div>
	</form>

	</div></div></div></div>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
	<div class="table-responsive">
	<table  data-toggle="table"   width="100%" border="1" cellspacing="2" cellpadding="4" >
	     <thead>
		    <tr>
				 <th data-sortable="true">S.No </th> 
				 <th data-field="date" data-sortable="true">Date</th>
				 <th data-field="vchno" data-sortable="true">Bil.No</th>
				 <th data-field="acname" data-sortable="true">Ac Name</th>
				 <th data-field="remarks" data-sortable="true">Remarks</th>
				 <th data-field="debit" data-sortable="true">Debit</th>
				 <th data-field="credit" data-sortable="true">Credit</th>
				 <th data-field="balance" data-sortable="true">Balance</th>
			 </tr>
		</thead>
		
		<div class="form-group has-feedback"> 
		<?php
		//$opnbal=0;
		$closbal=0;$bal=0;
		echo 'Opening Balance Rs-.'.$opnbal;
		?></div>
		<?php 
			if(count($acc))
			{
			   $i = 1;	
				foreach($acc->result() as $row)
				{
			
		?>
		
		    <tr>
			<td><?php echo $i; ?></td>
			<td>
            <span  class="text"><?php echo  date("d/m/Y g:i A", strtotime($row->vch_dt)); ?></span>
            </td>
			<td>
            <span  class="text"><?php echo  $row->bill_no.'-'.$row->vch_no; ?></span>
            </td>
			<td>
			  <?php $oppname='';
							$this->db->where('vch_no', $row->vch_no);
							$this->db->where('ac_code !=', $row->ac_code);	
							$this->db->select('ac_code'); $this->db->from('accentry'); 
						    $test =$this->db->get();//print_r( $test);
				            foreach($test->result() as $data)
				             {
				                $oppcode=$data->ac_code;							   
							    $this->db->select('ac_name'); $this->db->where('ac_code', $oppcode); $this->db->from('accmasaccounts');
								$oppname1=$this->db->get();	 foreach($oppname1->result() as $data)   {   $oppname=$data->ac_name;}
				               
				              } 
							  ?>  
			  
				
            <span  class="text"><?php echo  $oppname; ?></span>
            </td>
			<td>
		  <span  class="text"><?php
		      
    		  echo  $row->remarks; ?>
			  </span>
			</td>
			<td>
            <span  class="text"><?php echo  abs($row->dr_amt); ?></span>
			</td>
			<td>
            <span  class="text"><?php echo  $row->cr_amt; ?></span>
			</td>
			<td>
             <span  class="text"><?php 
			 
			 if ($i == 1){ $bal=$opnbal+$bal+$row->cr_amt+$row->dr_amt;}
			 else {$bal=$bal+$row->cr_amt+$row->dr_amt;}
			 
			 if( $bal<0) {echo 'Rs.'.abs($bal).'.Dr';} else { echo 'Rs.'.abs($bal).'.Cr';}
			 ?></span>
			</td>
		
			
		</tr>
		<?php  $i=$i+1;}
		}
		?>
		</table>
		<table>
		<tr><td>
        <div class="form-group has-feedback"> 
		<?php  if( $bal<0) {echo 'Closing Balance Rs.'.abs($bal).'Dr';} else { echo 'Closing Balance Rs.'.abs($bal).'Cr';} ?>;</div>
		<td></tr>	</table>
		</div>
	
</div>
 
 
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script script="javascript">
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.form-control').select2();
	 
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
 </body>
 </html>
 