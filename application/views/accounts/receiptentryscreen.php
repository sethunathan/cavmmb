
<button type="button"  id="main"  class="btn btn-primary"><--Back to Main Screen</button>
	<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-8">
	
	<form  action=""   method="post" id="paymentsform"  class="form-horizontal">
							<fieldset><span id="accavail">New Entry</span><br>
    <table>
		 <tr>
	
				    <td><label>Voucher  No:<label></td>
				    <td><input   readonly  value=""  name="vchcode" id="vchcode" />
					</td>
		</tr>
		 <tr>
		    <td><label>Accounts From</label></td>
				<td>
					<select  id="accodefrom" name="accodefrom">		 
					    <?php
							
							$this->db->select('ac_name,ac_code'); 
							$this->db->order_by('ac_name');   
							
							$id=$this->session->userdata('agentid');
							$this->db->where('comp_id', $id);
							$names = array(2, 3, 17,18);
                            $this->db->where_not_in('group_code', $names);
                           					
                            $castxe= $this->db->get('accmasaccounts');	
							$row = mysql_fetch_row($result);
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
		<script type="text/javascript">
 $("#accodefrom").select2({
  placeholder: "Select a State",
  allowClear: true
});
</script>
		<tr>
				    <td><label>Amount</label></td>
				    <td><input   class="form-control" placeholder="Enter Amount"  
					name="amount" pattern="[0-9]{10}" id="amount" type="tel" /></td>
		</tr>
		 <tr>
		    <td><label>Cash/Bank (A/c)</label></td>
				<td>
					<select  class="form-control" id="accodeto" name="accodeto">		 
					    <?php
							
							$this->db->select('ac_name,ac_code'); 
							$this->db->order_by('ac_name');   
							
                            $id=$this->session->userdata('agentid');
							$this->db->where('comp_id', $id);
							$names = array(2, 3, 17,18);
                            $this->db->where_in('group_code', $names);		
							
                            $castxe= $this->db->get('accmasaccounts');	
							$row = mysql_fetch_row($result);
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
					<textarea class="form-control" id="remarks" name="remarks"cols="25" rows="2"></textarea></td>
			
		</tr>		  
		
        <tr>
			<td>
			    <button type="button"  id="Addanother"   class="btn btn-primary" >Add</button>
				<button type="button"  id="SaveAccounts"     disabled  class="btn btn-primary" >Save</button>
				<a href="<?php echo base_url();?>accounts/receiptentry">
				<button type="button"  id="close"  class="btn btn-primary" >Close</button></a>
			</td>
		</tr>
	
		</table>
	</form>
				
				</div>
			</div>
			</div>
