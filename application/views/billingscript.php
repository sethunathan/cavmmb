<script type="text/javascript">
$(document).ready(function()
{
	alert('ss);
    $("#addnew").click(function(event)
    {
		
		initvar();
		
	    $(".entryscreen").show();
	    $(".mainscreen").hide();
	    $("#main").show();
	    $("#addnew").hide();
	   document.getElementById('accodefrom').focus();
   });  
//////////////////////////

  $('#exampleModal').on('show.bs.modal', function (e) {
	
	$('#messageid').val('loading');
	
    var messageid =$(e.relatedTarget).data('message');
    $('#messageid').val(messageid);
	
    var vch_no = $(e.relatedTarget).data('vchno');  
	$('#vch_no').val(vch_no);
	
	///////////////////////////////	
	
	$.ajax({
		url: '<?php echo site_url("accounts/getaccbillingreceipt")?>',
		type: "POST",
		data:'vch_no='+vch_no, 
		success: function(data){
			var dataa = data.split("$");
			$("#editamount").val(dataa[0]);			
	        $("#editremarks").val(dataa[1]);
			var accode =dataa[2];
			var comp_id =dataa[3];
			var oppac_code = dataa[4];
			var vch_dt = dataa[5];		
            $("input[name=comp_id][value=" + comp_id + "]").attr('checked', 'checked');	
            $("#editaccodefrom").val(accode);
            $("#editaccodeto").val(oppac_code);
			$('#vch_date').val(vch_dt);			
		},	error: function (request, status, error) {
        //alert(request.responseText); 
       $("#txtmessage").val(request.responseText);	
		} 
   });
	
	});
	 

////////////////////////////////


		 
	 
	  function initvar()
     {
		   
	  $("#accavail").html("New");
	  document.getElementById("SaveAccounts").disabled = false;
	  document.getElementById("another").disabled = true;	
	  
     
       var property = document.getElementById("another");	  
       property.style.backgroundColor = "red";
	   
	  
 
	   document.getElementById('amount').value='';
	   document.getElementById('remarks').value='';	  
	
	 
	   gud();	 
      
	 }
	
    
   $("#main").click(function(event)
    {
	  $(".entryscreen").hide();
	  $(".mainscreen").show();
	  $("#addnew").show();
	 
    }); 
	
	$('#another').click(initvar);	
	
	
	function gud()
	{
		
	   $.ajax({
		    url: '<?php echo site_url("accounts/getmaxacc")?>',
			//async: false,
		    type:'POST',
		    success:function(response){	
			document.getElementById('vchcode').value=response;
			}	
	   });
	 
	}	
	function initvar1()
    {
	document.getElementById("SaveAccounts").disabled = true;
	document.getElementById("Addanother").disabled = false;	
   
    var property = document.getElementById("another");	  
    property.style.backgroundColor = "green";
	
	
	document.getElementById('amount').value='';
	document.getElementById('remarks').value='';
	document.getElementById('vchcode').value='';	
	$("#accavail").html("View");
  }
	
  $("#SaveAccounts").click(function(event)
  {
	
	$("#accavail").html("Inserting");
	var accname=$('#amount').val();
	if (accname.length>0)
	{
		saveaccounts();
		initvar1();
	}
	else
	{
		alert('Amount Zero ');
		document.getElementById("amount").focus();
		event.preventDefault();
        return false;		
	}
	
  });
});
</script>
<script>
function saveaccounts()
{ 
	var result="";
	$("#accavail").html("Inserting");
	var amount=$('#amount').val();
	var remarks=$('#remarks').val();
	var accodefrom=$('#accodefrom').val();
	var accodeto=$('#accodeto').val();
	 
	var comp_idd = $("input[name='comp_idd']:checked").val();
	 
	$.ajax({
		        url: '<?php echo site_url("accounts/savereceipt")?>',
		        type:'POST',
				async: false,
				data:{amount:amount,remarks:remarks,accodefrom:accodefrom,accodeto:accodeto,comp_idd:comp_idd},
		        success:function(response){
					$("#accavail").html(response);
					result=response;
					 $(".entryscreen").hide();
	                 $(".mainscreen").show();
	                 $("#addnew").show();
					 $('#acc tr:last').after("<tr><td>"+remarks+"<td></tr>");
					
				},
		        error: function(jqxhr) {
                    $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
          }
		
	});
	
}
</script>

  <script>
 

function getsaveaccounts(action) {
	
	var messageid=$('#messageid').val();
	var accname=$('#editamount').val();
	if (accname.length<0)
	{
		alert('Amount Zero ');
		document.getElementById("editamount").focus();		 
        return false;	
	}
	 
	
	if(action=="saveaccounts"){
	if(confirm("Are you sure you want to Save this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
	}
	var vch_no=$("#vch_no").val(); 
    var vch_date=$("#vch_date").val();

	
	var editaccodefrom =$('#editaccodefrom :selected').val();  
    
	var editaccodefromtxt =$('#editaccodefrom :selected').text();  
	
    var editaccodeto =$('#editaccodeto :selected').val();  
 
	var remarks=$("#editremarks").val();   
    var editamount=$("#editamount").val();    
	var comp_id = $(".comp_id:checked").val();
	var acname="acname"+messageid;
	var remarkss="remarks"+messageid;
	 
    ///////////////////////////////////////////////////////////////////////////////////////////
	jQuery.ajax({
	 
	url: '<?php echo site_url("accounts/editsavebillreceipt")?>',
	data:{ comp_id:comp_id,remarks:remarks,editaccodefrom:editaccodefrom,editaccodeto:editaccodeto,vch_no:vch_no,
	 vch_date:vch_date,editamount:editamount
	},
	type: "POST",
	success:function(data){		
				$("#txtmessage").val(data+'Bill Saved Sucessfully');
		        $("#loaderIcon").hide();				 
				document.getElementById(acname).innerHTML =editaccodefromtxt;
                document.getElementById(remarkss).innerHTML =remarks;
                document.getElementById("amount"+messageid).innerHTML =editamount;				
	},
	error: function (request, status, error) {
        alert(request.responseText);
		 if(textstatus==="timeout") {
            alert("got timeout");
        } else {
            alert(textstatus);
        }
		 $("#txtmessage").val(request.responseText);
    }	
	});
	
	//////////////////////////////////////////////////////////////////////////////////////////
	 $("#loaderIcon").hide();
}
</script> 
