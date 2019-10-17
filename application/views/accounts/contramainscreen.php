
 <form id="rock" action="<?php echo base_url();?>accounts/contraentry" method="post" enctype="multipart/form-data">
      <br> <select id='monthn'  name="monthn">
         <option value=''>--Select Month--</option>
    <option selected value='1'>Janaury</option>
    <option value='2'>February</option>
    <option value='3'>March</option>
    <option value='4'>April</option>
    <option value='5'>May</option>
    <option value='6'>June</option>
    <option value='7'>July</option>
    <option value='8'>August</option>
    <option value='9'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>	
    </select> <br><br>
	  <input class="btn btn-primary"  type="submit" class="btn" value="Load"/>
				</form>		

       <table border="0" id="paginationstar" class="tableDemo bordered">
		<tr class="ajaxTitle">
			<th width="2%">Sr.No</th>
			<th width="10%">Date</th>
			<th width="10%">Ac Name</th>
			<th width="10%">Remarks</th>
			<th width="10%">Amount</th>
		</tr>
		<?php
		if(count($records)){
		 $i = 1;	
		foreach($records->result() as $row)
        {
			$id=$row->vch_no;
		?>
		
		    <tr class="edit_tr" id="<?php echo $id;?>">
			<td class="edit_td"><?php echo $i++; ?>#<?php echo $row->vch_no ;?></td>
			
			<td>			
			<span id="fifth<?php echo $id; ?>" class="text"><?php echo date("d/m/Y g:i A", strtotime($row->vch_dt));?> </span>
            <input type="text" value="<?php echo $row->amount; ?>" class="editbox" id="fifth_input_<?php echo $id; ?>">
			</td>
			
			<td>
			<span id="first_<?php echo $id; ?>" class="text"><?php echo  $row->ac_name; ?></span>
            <input type="text" value="<?php echo $row->ac_name; ?>" class="editbox" id="first_input_<?php echo $id; ?>">
            </td>
			
			<td>
			<span id="second_<?php echo $id; ?>" class="text"><?php echo  $row->remarks; ?></span>
            <input type="text" value="<?php echo $row->remarks; ?>" class="editbox" id="second_input_<?php echo $id; ?>">
			</td>
						
		
			<td>			
			<span id="fourth_<?php echo $id; ?>" class="text"><?php echo  $row->amount; ?></span>
            <input type="text" value="<?php echo $row->amount; ?>" class="editbox" id="fourth_input_<?php echo $id; ?>">
			</td>
			
		</tr>
		<?php }
		}
		?>
	
	