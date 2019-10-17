<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function savesubjob1(){
var edu =1 ;  
$.ajax({
        type: 'POST',
        url: '<?php echo site_url("subjob/savesubjob1")?>',
        data: { edu:edu},
        success:function(response){alert(response);
        },error: function(xhr, status, error) {
  alert(error);
}
});
}
</script>
<label id="theLabel1">Welcome</label>

		<br>
<!-------------------------------------- Load--------------------->


      <div border="1" id="paginationstar" cellspacing="0"></div>
      	<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
			.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
		</style>
		 
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,subjob_codee) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: '<?php echo site_url("subjob/savesubjob1")?>',			
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&subjob_codee='+subjob_codee,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>

<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">     
	<td>Name</td>
	<td>A.Year</td> 	
    <td>Edit</td>	
  </tr>
  
<?php foreach ($agent as $rsagent) : ?>  
  <tr>
    <td><label id="lbl1"><?php echo $rsagent['subjobnamee'] ; ?> </label>
	 <input type="text" id="text" value="<?php echo $rsagent['subjobnamee'] ; ?>"/> </td>
	  <td><?php echo $rsagent['yearname'] ; ?></td>  
     
     <td><button class="btn btn-primary" id="cmdEdit" type="button">Edit</button></td> 
     <td><button class="btn btn-primary" id="cmdSave"  type="button">Save</button></td> 
  </tr>
<?php endforeach ; ?>
</table>
 
 <div id="comment-list-box">
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <thead>
	<tr>
	  <th class="table-header">Title</th>
	  <th class="table-header">Description</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
 <?php if(!empty($agent)) { foreach($agent as $rsagent) { ?>
 <tr>
    <td contenteditable="true" onBlur="saveToDatabase(this,'subjobnamee','<?php echo $rsagent['subjob_codee']; ?>')" 
	onClick="showEdit(this);"><?php echo $rsagent['subjobnamee']; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'answer','<?php echo $rsagent['subjob_codee']; ?>')"
				onClick="showEdit(this);"><?php echo $rsagent['subjobnamee']; ?></td>
			  </tr>
 
 
 
 <?php }} ?>
 
  </tbody>
</table>
 
<!--------------------------------------End Load--------------------->
 <script>
 $().ready = function() {
     $('#text').hide();
     $('#lbl1').show();
     $("#cmdEdit").click(function() {
         $('#text').toggle();
		 $('#lbl1').hide();
     });
	 $("#cmdSave").click(function() {
         $('#text').hide();
		 $('#lbl1').show();
     });

}();
 
</script>