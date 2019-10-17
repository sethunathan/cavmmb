<div class="mainscreen"  >
    <div class="col-sm-2">	
	   <button type="button" id="addnew"  class="btnDeleteAction" >Add New</button> 
	</div>	
   <div class="form-group">
    <form id="rock" action="<?php echo base_url();?>accounts/receiptentry" method="post" enctype="multipart/form-data">  
			<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
    <div class="col-sm-2">
	<select  class="form-control"  id='monthn'  name="monthn" >
    <?php
	if(!empty($monthn)) 
		 {  
 		    $groupcode=$monthn;		   
		}
        else { $groupcode=date('n');}
	///echo "<script type='text/javascript'>alert('$groupcode');</script>"; 
    for ($i = 0; $i < 12; $i++) {
		$s='';
        $time = strtotime(sprintf('%d months', $i));   
        $label = date('F', $time);   
        $value = date('n', $time);
		if ($value==$monthn) {$s='selected';}
        echo "<option value='$value' $s >$label</option>";
    }
    ?>
</select>
	  
 
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
		  </tr>
		  
		<?php $i=1; foreach($records->result() as $row)
		 { 
			$id=$row->vch_no;
		 ?>  
			 
			<tr id="message_<?php echo $i;?>" class="table-row">
			<td><?php echo $i; ?></td>  
			<td ><?php echo $row->vch_no;?></td>   
			<td><?php echo date("d/m/Y g:i A", strtotime($row->vch_dt));?></td>   	
			<td id="acname<?php echo $i;?>"><?php echo $row->ac_name; ?></td>
			<td id="amount<?php echo $i;?>"><?php echo $row->amount;  ?></td> 
	    	<td id="remarks<?php echo $i;?>"> <?php echo $row->remarks;  ?></td> 
			<td> 
		 	
			<button type="button" class="btn btn-primary" 
            data-message="<?php echo $i; ?>" 			
			data-vchno="<?php echo $row->vch_no; ?>" 
            data-accode="<?php echo $row->ac_code; ?>"
			data-oppaccode="<?php echo $row->oppac_code; ?>"
			data-amount="<?php echo $row->amount; ?>"
			data-compid="<?php echo $row->comp_id; ?>"
			data-remarks="<?php echo $row->remarks; ?>"
			data-vchdate="<?php echo $row->vch_dt; //date("d/m/Y g:i A", strtotime($row->vch_dt)); ?>"
			data-toggle="modal" 
			data-target="#exampleModal">
      Edit Bill
     </button> 
  
			  </td>
			 
		  </tr> 
		  <?php $i=$i+1; ?>
			
		 <?php } ?>
		</table> 
		</div>
</div>

<div class="modal fade" id="exampleModal"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
	        
			 
			<input type="text" readonly  id="messageid"   name="messageid"   class="form-control"> 
		    <input type="text" readonly  id="vch_no"  name="vch_no"   class="form-control"> 
			<input type="text" readonly  id="vch_date"    name="vch_date"  class="form-control"> 
	        <input type="text" readonly   value ="Select Company" class="form-control"> 
	        <div class="form-group has-feedback"> 
		    <?php
			    $this->db->order_by('comp_id');					
                $this->db->select('comp_id,comp_name');                      
                $castxe= $this->db->get('mascompany');	
			    $row = mysqli_fetch_row($result);
			    foreach($castxe->result() as $data)
				  {
				   echo "<input type='radio' name='comp_id'  id='$data->comp_id' class='comp_id' value='$data->comp_id'";
				   echo ">$data->comp_name</input>";					
				 } 
		    ?>		 
           </div> 
        
		<input type="text" readonly   value ="Accounts To" class="form-control"> 
		<div class="form-group has-feedback">
			<select  class="form-control"  style="width: 100%"  id="editaccodefrom" name="editaccodefrom">
				<?php	
				$this->db->select('ac_name,ac_code'); 
				$this->db->order_by('ac_name');  
				$branchcode = $this->session->userdata('branchcode');
				$this->db->where('group_code', $branchcode);	 
				$castxe= $this->db->get('accmasaccounts');	
				$row = mysqli_fetch_row($result);		
				foreach($castxe->result() as $data)	
				{				           
			    	echo "<option value= '$data->ac_code'";	
				    echo ">$data->ac_name</option>";	
				} 			
				?>  	
			</select>
		</div>			
		
        <input type="text" readonly   value ="Cash/Bank" class="form-control"> 
		  <div class="form-group has-feedback">
			<select  class="form-control"  style="width: 100%"  id="editaccodeto" name="editaccodeto">
				<?php	
				$this->db->select('ac_name,ac_code'); 
				$this->db->order_by('ac_name');  
				$names = array(2, 3, 17,18);
				$this->db->where_in('group_code', $names); 
				$castxe= $this->db->get('accmasaccounts');	
				$row = mysqli_fetch_row($result);		
				foreach($castxe->result() as $data)	
				{				           
			    	echo "<option value= '$data->ac_code'";	
				    echo ">$data->ac_name</option>";	
				} 			
				?>  	
			</select>
		</div>				
      		
		<div>Amount</div>
        <div class="form-group has-feedback">
           <input type="text"   id="editamount"  name="editamount" value ="" class="form-control"	placeholder="Amount">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 		
		 
			 				
	 
        <div>Remarks</div>		
		<div class="form-group has-feedback">
           <input type="text"  id="editremarks" name="editremarks" value ="" class="form-control"	placeholder="Remarks">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
	   
<button 
	type="button" 
	id="movetoverificationlevelmodal" 
	data-dismiss="modal"  
	class="btn btn-primary" 
	name="movetoverificationlevelmodal"
    onClick="getsaveaccounts('saveaccounts')"> Save</button>

</div>
 
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 


     
</div>