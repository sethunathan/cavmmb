<?php include 'body.php';?>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <style>
  body{width:610px;}
  #sortablea-row { list-style: none; }
  #sortablea-row li { margin-bottom:4px; padding:10px; background-color:orange;cursor:move;}
  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
  #sortablea-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
  </style>
  <style>
  body{width:610px;}
  #sortableb-row { list-style: none; }
  #sortableb-row li { margin-bottom:4px; padding:10px; background-color:#BBF4A8;cursor:move;}
  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
  #sortableb-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
  </style>
  
    <style>
  body{width:610px;}
  #sortablec-row { list-style: none; }
  #sortablec-row li { margin-bottom:4px; padding:10px; background-color:#BBF4A8;cursor:move;}
  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
  #sortablec-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
  </style>
      <style>
  body{width:610px;}
  #sortabled-row { list-style: none; }
  #sortabled-row li { margin-bottom:4px; padding:10px; background-color:lightgreen;cursor:move;}
  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
  #sortabled-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
  </style>
  
  <script>
  $(function() {
    $( "#sortablea-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  });
  

  
  function saveFollowup() {
	var row_ordera = new Array();
	$('ul#sortablea-row li').each(function() {
	row_ordera.push($(this).attr("id"));
	});
	jQuery.ajax({
	url: '<?php echo site_url("admin/sortablethreea")?>',
	data:{ row_ordera:row_ordera},
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
	//document.getElementById("row_ordera").value = selectedLanguage;
	//alert(selectedLanguage);
  }
  </script>
  


<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<body>
 
	<input type = "hidden" name="row_ordera" id="row_ordera" /> 
	<ul id="sortablea-row">
		<?php
		if ($taskstagea)
		   {
			   $i=1;
		   foreach($taskstagea->result() as $data)
				{
					
		?>
		<li id=<?php echo $i.'.'.$data->task_code; ?>>
		<?php echo $data->task_name; ?>
		 <div id="diva_<?php echo  $data->task_code;?>">
		<select class="form-control" id="selecta_<?php echo  $data->task_code;?>" name="task">	
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
		 <Button id="buttona_<?php echo  $data->task_code;?>   class="btnEditAction" name="reverse"
	     onclick="saveentrya('<?php  echo  $data->task_code ?>')"> Foll-Assingn</Button>
       
		  </div>
		
		</li>
		<?php $i=$i+1;
		}
	    }
		?>  
		
	</ul>
	<input type="hidden"  name="emp_code" value="<?php echo $emp_code; ?>" />
	<input type="submit" class="btnSave" name="submit" value="Save Followup" onClick="saveFollowup();" />
	</br>
<br>
	 <script>
function saveentrya(id) { 
	$test=$('#selecta_'+id).val();	
   // $('#divvv_'+id).html('Loading');		
	$.ajax({
		url: '<?php echo site_url("admin/saveentrya")?>',
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

 
  
  <script>
  $(function() {
    $( "#sortableb-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  }); 
  
    function saveOrder() {
	var row_orderb = new Array();
	$('ul#sortableb-row li').each(function() {
	row_orderb.push($(this).attr("id"));
	});
	
	jQuery.ajax({
	url: '<?php echo site_url("admin/sortablethreeb")?>',
	data:{ row_orderb:row_orderb},
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

<input type = "hidden" name="row_orderd" id="row_orderd" /> 
	<ul id="sortabled-row">
		<?php
			
		
		 if ($results)
		{
			   $i=1;
		   foreach($results  as $data)
            {
				 $varr='';
		    if($data->movetotask==1)
			{
				$varr=' IN Entry Level '.$data->entryandverfiorder;
			}
			 if($data->movetotask==2)
			{
				$varr=' IN Verification Level '.$data->entryandverfiorder;
			}
			if($data->movetotask==1)
			{
		?>
		
		<li  style='background-color: lightgreen;' id=<?php echo $data->id; ?>>
			<?php }

			if($data->movetotask==2)
			{?>
		<li  style='background-color: lightblue;' id=<?php echo $data->id; ?>>
		 
		<?php 
		    }
			
		    echo $i.'-'.$data->ac_name.'-'. $data->subjobname.'-'. $data->remarks.'-'.$varr;  ?>
			
		<div   id="divvvv_<?php echo  $data->id;?>">
			 
		<select class="form-control" id="selectt_<?php echo  $data->id;?>"   name="task">	
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
		<br>
		 <?php
		if($data->movetotask==1)
			{
			 
			?> 
		 <Button  style=' font-size:20px;background-color:darkgreen;' class='btn btn-primary' type='button'
		 id="buttonn_<?php echo  $data->id;?>   class="btnEditAction" name="reverse"
	     onclick="saveentry('<?php  echo  $data->id ?>')"> Assingn-Entry</Button>
        <?php 
		} 
		if($data->movetotask==2)
			{
		?>  
        <Button  style=' font-size:20px;background-color:skyblue;' 
		class='btn btn-primary' type='button'
		id="buttonn_<?php echo  $data->id;?>   class="btnEditAction" name="reverse"
	     onclick="saveveri('<?php  echo  $data->id ?>')"> Assingn-Verification</Button>
        <?php 
		} 		
		 ?>
		 </div>
		 </li>
		 	<?php
		$i=$i+1;
		    }
		?>
		 
		<?php 
		}
		
		?>  
		
	</ul>
	<input type="hidden"  name="emp_code" value="<?php echo $emp_code; ?>" />
	<input type="submit" class="btnSave" name="submit" value="Save Entry&Verification" onClick="saveEntryVerfi();" />
	<br>
		 <script>
function saveveri(id) { 
	$test=$('#selectt_'+id).val();	
   // $('#divvv_'+id).html('Loading');		
	$.ajax({
		url: '<?php echo site_url("admin/saveveri")?>',
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
	 <script>
function saveentry(id) { 
	$test=$('#selectt_'+id).val();	
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
	 <script>
  $(function() {
    $( "#sortabled-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  }); 
  
    function saveEntryVerfi() {
	var row_orderd = new Array();
	$('ul#sortabled-row li').each(function() {
	row_orderd.push($(this).attr("id"));
	});
	//entryandverfiorder
	jQuery.ajax({
	url: '<?php echo site_url("admin/sortablethreed")?>',
	data:{ row_orderd:row_orderd},
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
	
	
	
	
 
 

<?php include 'bodyfooter.php';?>
 
</body>
</html>