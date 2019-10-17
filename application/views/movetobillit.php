<div class="modal fade" id="itModal"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
		
         <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon1"  />
		<div  class="form-group has-feedback">
            <div>Task #</div><input type="text" readonly id="id" name="id"  value ="" class="form-control">
			<input type="text" readonly id="task_code" name="task_code" value ="" class="form-control">
          
        </div> 
		
		<div style="display:none"  class="form-group has-feedback">
           <input type="text" readonly id="acname" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
		
		<div  style="display:none" class="form-group has-feedback">
           <div>AC Code</div><input type="text" readonly id="accode" name="accode" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
		
		<div  style="display:none" class="form-group has-feedback">
           <div>Sub Job</div><input type="text" readonly id="subjobcode" name="subjobcode" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
		
		<div class="form-group has-feedback">
           <div>Child</div><input type="text" readonly id="childtaskcode" name="childtaskcode" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
          <div class="txt-heading"   id="tablef">
		 
	     
		
        <div style="display:none" class="form-group has-feedback">
           <input type="text" readonly id="task_name" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 	
        
		<div class="form-group has-feedback">
        <input type="text" id="itreturndate"   class="form-control"		 
		placeholder="Return Date (Format-dd/mm/yyyy- ex:31/12/2018)">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
 
		
	<div class="txt-heading"   id="tablef">		  
	  <div>Entry Assingn to</div>
	   <select class="form-control" id="verified" name="verified">
       	   
		 <option value='1'>Un-Verified</option>;
         <option value='2'>Verified</option>;	    
		</select>	
        </div>
		 <br>
		 
        <div>Next Task Status</div>    		
        <div  class="form-group has-feedback">
		    <input type="text" readonly  id="nxttask"  name="nxttask" value ="Attach Next Task-Yes/No" class="form-control">
		    <div id="divnxttask" id="divnxttask">
            <input type="radio" value="100"  checked name="nextbill" >Yes 
		    <input type="radio" value="101"  name="nextbill">No<br/>
            </div>			
        </div>
	
        <div  class="form-group has-feedback">	
	     <style>.cont {  border-style: solid;  border-color: coral;}		</style>
	     <div   class="cont"  id="nexttaskyes">	<div > <?php include 'paymentlistaltersubfile.php'; ?> 	 <br/></div>	</div>	
	    </div>
		<div  class="form-group has-feedback">	
				<button type="button" class="btn btn-info open-modal" data-dismiss="modal" > Move to Bill	 </button>
        </div>
</div>
 

<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 
</div>
<script>
 $(document).ready(function(){
	 
	
    $('#itModal').on('show.bs.modal', function (e) {
		$('#id').val('loading');
		
		$('#nxttask').val("Attach Next Task-Yes/No");
		$("#divnxttask").show();
		$("#nexttaskyes").show()
		
		var $radios = $('input:radio[name=nextbill]');
		$radios.filter('[value=100]').prop('checked', true);
		
		
		var  itreturndate = $(e.relatedTarget).data('itreturndate'); 
	    var todaydate = new Date();
        var day = todaydate.getDate();
        var month = todaydate.getMonth() + 1;
        if (month < 10) { month = '0' + month; }
        var year = todaydate.getFullYear();
        var datestring = day + "/" + month + "/" + year;
        $('#itreturndate').val(datestring);
		
        var  id = $(e.relatedTarget).data('id');  
	    var  subjobcode =$(e.relatedTarget).data('subjobcode');
		var  childtaskcode =$(e.relatedTarget).data('childtaskcode');
	    var  task_code = $(e.relatedTarget).data('taskcode');
		
		var  name = $(e.relatedTarget).data('acname'); 
		var  task_name = $(e.relatedTarget).data('taskname');        
        var  accode = $(e.relatedTarget).data('accode'); 
		
		$('#acname').val(name);
		$('#task_code').val(task_code);	
		$('#task_name').val(task_name);
		$('#accode').val(accode);	
		$('#id').val(id);	
		$('#subjobcode').val(subjobcode);
		$('#childtaskcode').val(childtaskcode);
		
		if (childtaskcode==="")
		{ 
	        childtaskcode=1;
		}
	    $.ajax({
		      url: '<?php echo site_url("itfollowup/getselect2task")?>',
		      type: "POST",
		      data:'childtask_code='+childtaskcode+'&ac_code='+accode,  
		      success: function(data){				
				var dataa = data.split("$");
			   
			    var data1=dataa[0];			
	            var data2=dataa[1];	
					//alert(data1);alert(data2);
				if (data1=="Pass")
				{
					 
		    	   $('#e1').html(data2);
				  // $("#txtmessage").val(data2);
                }
                else if (data1=="Fail")
				{
		    	    $radios.filter('[value=101]').prop('checked', true);
					$("#nexttaskyes").hide();
					$("#divnxttask").hide();
					$('#nxttask').val(data2);	
					//alert(data2);
                }				
		     },	error: function (request, status, error)
 	     	 {        
                $("#txtmessage").val(request.responseText);	
		    } 
           });
		   
		$("input:radio").click(function() {
	      if($(this).val()=="100")
	        {$("#nexttaskyes").show();}
	     else if($(this).val()=="101")
	      {
			
		    $("#nexttaskyes").hide();
	     }
	    });   
		
    });
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.open-modal').click(function(e)
{
    
    $("#loaderIcon1").show();
   
    var id=$('#id').val();	
	var task_code=$('#task_code').val();
	var accode=$('#accode').val();
	var itreturndate=$('#itreturndate').val();
	var nexttask= $('#e1 :selected').val();
	var nextbill = $("input[name='nextbill']:checked").val(); 
    var verified=$("#verified").val();
	 
	if (nextbill==100)
	{ 
		if (nexttask === "")
		{
			alert("Select Next Task!!!!!")
			$("#loaderIcon1").hide();			 
			return false;
		}
		
	}
	   
	
	if(confirm("Are you sure you want to Move this?")){ }
    else{		 
		$("#loaderIcon1").hide();
    
		  return false;
    }
	
	
	jQuery.ajax({
	url: '<?php echo site_url("itfollowup/savenextask")?>',
	data:{ id:id,task_code:task_code,accode:accode,nexttask:nexttask,nextbill:nextbill,verified:verified,itreturndate:itreturndate},
	type: "POST",
	success:function(data){	     
                
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val('Entry Moved Sucessfully');
		        $("#loaderIcon1").hide();		        
	},
	error: function (request, status, error) {
        alert(request.responseText);
		$("#txtmessage").val(request.responseText);
		 
    }	
	});//////////////AJAX	
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});
///////////////////////////////////////
</script>
 
 <script>
function saveverificationlevelmodalit(action,id,remarks1) {
	$("#loaderIcon1").show();
   
    var id=$('#id').val();	
	var task_code=$('#task_code').val();
	var accode=$('#accode').val();
	var itreturndate=$('#itreturndate').val();
	var nexttask= $('#e1 :selected').val();
	var nextbill = $("input[name='nextbill']:checked").val(); 
    var verified=$("#verified").val();
	 
	if (nextbill==100)
	{ 
		if (nexttask === "")
		{
			alert("Select Next Task!!!!!")
			$("#loaderIcon1").hide();
			return false;
		}
		
	}
	
	if(action=="movetobilling"){
	if(confirm("Are you sure you want to Move this?")){ }
    else{		 
		$("#loaderIcon1").hide();
        return false;
    }
	}
	
	jQuery.ajax({
	url: '<?php echo site_url("itfollowup/savenextask")?>',
	data:{ id:id,task_code:task_code,accode:accode,nexttask:nexttask,nextbill:nextbill,verified:verified,itreturndate:itreturndate},
	type: "POST",
	success:function(data){	     
                
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val('Entry Moved Sucessfully');
		        $("#loaderIcon1").hide();
		        $('#itModal').modal('hide');
	},
	error: function (request, status, error) {
        alert(request.responseText);
		$("#txtmessage").val(request.responseText);
		$("#itModal").modal('hide');
    }	
	});
}
</script> 