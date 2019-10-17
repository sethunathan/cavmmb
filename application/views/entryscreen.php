<div class="entryscreen" style="display:none;">
	<button type="button" id="main"  class="btnDeleteAction" >Back</button> 

	<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-8">
 
	<form  action=""   method="post" id="receiptform"  class="form-horizontal">
							<fieldset id="buildyourform"><span id="accavail">New Entry</span><br>
    <table class="table">
		 <tr>
	
				    <td><label>Voucher No:<label></td>
				    <td><input   class="form-control" readonly  value=""  name="vchcode" id="vchcode" ><br></input> 
					</td>
		</tr>
		<tr>
		    <td><label>Company Under</label></td>
			<td><?php
			 		
            $this->db->order_by('comp_id');					
            $this->db->select('comp_id,comp_name');                      
            $castxe= $this->db->get('mascompany');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<input type='radio' name='comp_idd'  id='$data->comp_id'   value='$data->comp_id'";
					if ($data->comp_id==2){ echo "checked";}
				    echo ">$data->comp_name</input>";					
				} 
		?>  </td>
		 <tr>
		    <td><label>Accounts From</label></td>
				<td>  <select  class="form-control"  style="width: 100%"  id="accodefrom" name="accodefrom">
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
					
					<br>
				</td>
		</tr>
		
		<tr>
				    <td><label>Amount</label></td>
				    <td><input  class="form-control" placeholder="Enter Amount"  
					name="amount" pattern="[0-9]{10}" id="amount" type="tel" /><br></td>
		</tr>
		 <tr>
		    <td><label>Cash/Bank (A/c)-To</label></td>
				<td>
					<select  class="form-control"  style="width: 100%" id="accodeto" name="accodeto">		 
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
					<br>
				</td>
		</tr>
		<tr>
				    <td><label>Remaks</label></td>
				    <td>
					<textarea class="form-control" id="remarks" name="remarks"cols="25" rows="1"></textarea></td>
			
		</tr>		  
		
        <tr>
			<td>
			    <button type="button"  id="another"   name="another"   class="btnDeleteAction" >Add</button>
				<button type="button"  id="SaveAccounts"     disabled  class="btnDeleteAction"  >Save</button>
			</td>
		</tr>
	</fieldset> 
 
		</table>
	</form>
	 			
				</div>
			</div>
			</div>
</div>