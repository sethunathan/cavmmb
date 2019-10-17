<input type = "hidden" name="row_orderb" id="row_orderb" /> 
	<ul id="sortableb-row">
		<?php
			
		
		 if ($taskstageb)
		{
			   $i=1;
		   foreach($taskstageb->result() as $data)
            {
		?>
		<li id=<?php echo $data->id; ?>>
		<?php 
		    $varr='';
		    if($data->movetotask==1)
			{
				$varr=' IN Entry Level ';
			}
			 if($data->movetotask==2)
			{
				$varr=' IN Verification Level ';
			}
		    echo $i.'-'.$data->ac_name.'-'. $data->subjobname.'-'. $data->remarks.'-'.$varr;  ?>
			 <div id="divvv_<?php echo  $data->id;?>">
		<select class="form-control" id="select_<?php echo  $data->id;?>" name="task">	
		 <?php
			$this->db->order_by('emp_code');
            $this->db->where('active',1); 			
            $this->db->select('empname,emp_code');                      
            $castxe= $this->db->get('masemp');	
		    foreach($castxe->result() as $dataa)
				{
				    echo "<option value='$dataa->emp_code'";                   						
				    echo ">$dataa->empname</option>";
				} 
		?>   
        </select>
		 <Button id="button_<?php echo  $data->id;?>   class="btnEditAction" name="reverse"
	     onclick="saveentry('<?php  echo  $data->id ?>')"> Assingn</Button>
       
		  </div>
		 </li>
		 	<?php
		$i=$i+1;
		    }
		?>
		 
		<?php 
		}
	   
	  // }		
		
		?>  
		
	</ul>
 
  <script>
function saveentry(id) { 
	$test=$('#select_'+id).val();	
   // $('#divvv_'+id).html('Loading');		
	$.ajax({
		url: '<?php echo site_url("admin/saveentry")?>',
		type: "POST",
		data:'id='+id+'&emp_code='+$test,		
		success: function(data)
		{
			alert("Completed");
			//$('#divvv_'+id).html('OK');   
         			
	 		
		},
	error: function (request, status, error) {
        alert(request.responseText);
    }
    //$("#loaderIcon").hide();    
   }); 
}
</script>

	<input type="hidden"  name="emp_code" value="<?php echo $emp_code; ?>" />
	<input type="submit" class="btnSave" name="submit" value="Save Entry" onClick="saveOrder();" />
   <script>
  $(function() {
    $( "#sortablec-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  }); 
  function saveVerification() {
	var row_orderc = new Array();
	$('ul#sortablec-row li').each(function()
	{
	   row_orderc.push($(this).attr("id"));
	});
	
	 
	jQuery.ajax({
	url: '<?php echo site_url("admin/sortablethreec")?>',
	data:{ row_orderc:row_orderc},
	type: "POST",
	success:function(data){
		 
		 $("#txtmessage").val(data);
		  alert(data);
		 
	},
	error: function (request, status, error) {
        alert(request.responseText);
		 $("#txtmessage").val(request.responseText);
    }
	
	});

  }
  </script>
 <br> <br>
	<input type = "hidden" name="row_orderc" id="row_orderc" /> 
	<ul id="sortablec-row">
		<?php
			   $i=1;
		
		 if ($taskstagec)
		   {
		   foreach($taskstagec->result() as $data)
				{
		?>
		<li id=<?php echo $data->id; ?>>
		<?php echo  $i.'.'.$data->ac_name.'-'. $data->subjobname.'-'. $data->remarks;  ?></li>
		<?php 
		   $i=$i+1;
		}
		
	    }		
		
		?>  
		
	</ul>
 
	<input type="hidden"  name="emp_code" value="<?php echo $emp_code; ?>" />
	<input type="submit" class="btnSave" name="submit" value="Save Verification" onClick="saveVerification();" />
	
 