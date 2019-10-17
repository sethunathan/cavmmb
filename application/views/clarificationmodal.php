<div class="modal fade" id="clarificationmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
			
			<table class="AdminTable" id="table1" width="100%" border="1" cellspacing="2" cellpadding="4" >
  <tr class="AdminTableHeader">    
    <td>Id</td>  		
    <td>Client</td>  
	<td>Query</td> 
  </tr>
  
 
    <tr  class="table-row">
	<td><input type='text' readonly name='id1' id='id1'></td>   
    <td><input type='text' readonly name='text1' id='text1'></td> 
    <td><textarea  name="remarks1" id="remarks1" cols="40" rows="5"></textarea>
	 </td> 	
  </tr> 
 
</table>
		 </div>
			
            <div class="modal-footer">
			<button type="button" class="btn btn-primary" name="clarification"
      onClick="callCrudAction('clarification',document.getElementById('id1').value,
	  document.getElementById('remarks1').value)">
      Move to Clarification Level</button> 
                <button type="button"   class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div> 
</div> 

