 <link rel="stylesheet" href="http://localhost/senthil/assetsaccounts/css/style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://localhost/senthil/assetsaccounts/js/jquery-1.11.0.min.js"></script>	
  <script src="http://localhost/senthil/assetsaccounts/js/jquery-ui.js"></script>
<script>
$(function() 
{
  function initvar()
  {
	$("#accavail").html("New");
	document.getElementById("AddItem").disabled = false;
	document.getElementById("Addanother").disabled = true;
	  
	document.getElementById('accname').value='';
	document.getElementById('address').value='';
	document.getElementById('mobile').value='';
	document.getElementById('opnbal').value='';
	document.getElementById("accname").focus();
	$("#user-availability-status").html("View");
	gud();
  }
	
	 function initvar1()
  {
	
	document.getElementById("AddItem").disabled = true;
	document.getElementById("Addanother").disabled = false;
	  
	document.getElementById('accname').value='';
	document.getElementById('address').value='';
	document.getElementById('mobile').value='';
	document.getElementById('opnbal').value='';
	document.getElementById('acccode').value='';
	$("#user-availability-status").html("View");
	$("#accavail").html("View");
  }
  
	function gud()
	{
	   $.ajax({
		    url: '<?php echo site_url("accounts/accounts/getmaxx")?>',
		    type:'POST',
		    success:function(response){
			document.getElementById('acccode').value=response;
			}
	   });
	 
	}
	
  $("#Addanother").click(function(event)
  {
	initvar();
  }
  );
    
	
  $("#AddItem").click(function(event)
  {
	 
	$("#accavail").html("Inserting");
	var accname=$('#accname').val();
	if (accname.length>0)
	{
		var accname=$('#accname').val();
	    $.ajax(
		{
		    url: '<?php echo site_url("accounts/accounts/checkaccnameavailnew")?>',
		    type:'POST',
			data:'accname='+$("#accname").val(),
		    success:function(response)
			{
				if (response==0)
				{
					alert('Check Accounts Name');
					document.getElementById("accname").focus();
		            event.preventDefault();
					return false;
				}
				else if(response==1)
				{
					var promise = addusername();
				    initvar1();
					return true;
				}
			}
		});		
	}
	else
	{
		alert('Accounts  Name Empty ');
		document.getElementById("accname").focus();
		event.preventDefault();
        return false;		
	}
	
  });
  
  
});

function checkUsername()
{

	var result="";
	var accname=$('#accname').val();
	$.ajax({
		        url: '<?php echo site_url("accounts/accounts/checkaccnameavail")?>',
		        type:'POST',
				async: false,
				data:'accname='+$("#accname").val(),
		        success:function(response){
					$("#user-availability-status").html(response);
					  result = response; 
				},
		        error:function(){
					$("#user-availability-status").html("Accounts Name Already Taken");
					result = 'taken'; 
				}
		
	});
	return result;
}
</script>
<script>
function addusername()
{ 
	var result="";
	$("#accavail").html("Inserting");
	var accname=$('#accname').val();
	var address=$('#address').val();
	var mobile=$('#mobile').val();
	var groupcode=$('#groupcode').val();
	var opnbal=$('#opnbal').val();
	$.ajax({
		        url: '<?php echo site_url("accounts/accounts/saveaccname")?>',
		        type:'POST',
				//data:'accname='+$("#accname").val()&'address='+$("#address").val(),
				data:{accname:accname,address:address,mobile:mobile,groupcode:groupcode,opnbal:opnbal},
		        success:function(response){
					$("#accavail").html(response);
					result=response;initvar1();
					alert(result);
				},
		        error: function(jqxhr) {
                    $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
          }
		
	});
	//alert(result);
	return result;
}
</script>

<style>
.width: {300%;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.accavail{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>


<!-- Modal -->
<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-8">
	
	<form  action=""   method="post" id="accountsform"  class="form-horizontal">
							<fieldset><span id="accavail">New Entry</span><br>
    <table>
		 <tr>
	
				    <td><label>Accounts No:<label></td>
				    <td><input   readonly  value=""  name="acccode" id="acccode" />
					</td>
		</tr>
		<div id="frmCheckUsername">
		<tr>
				    <td><label>Accounts Name</label></td>
				    <td>
					   <input   class="demoInputBox" placeholder="Enter a valid Accounts name"  
					       name="accname"  id="accname"  onblur="checkUsername()" />
					<span id="user-availability-status"></span>
					</td>
		</tr>
		</div>
		<tr>
				    <td><label>Address</label></td>
				    <td>
					<textarea class="form-control" id="address" name="address"cols="25" rows="2"></textarea></td>
			
		</tr>
		<tr>
				    <td><label>Contact Number</label></td>
				    <td><input   class="form-control" placeholder="Enter a valid Accounts Contact No"  
					name="mobile" pattern="[0-9]{10}" id="mobile" type="tel" /></td>
		</tr>
		<tr>
				    <td><label>Openning Balance</label></td>
				     <td><input class="form-control"  pattern="\d*"  value=""  name="opnbal" id="opnbal" />
					</td>
			
		</tr>
		<tr><td><label>Accounts Group</label></td>
				<td>
					<select  class="form-control" id="groupcode" name="groupcode">		 
					    <?php
							
							$this->db->select('group_name,group_code'); $this->db->order_by('group_name');                          
                            $castxe= $this->db->get('accmasgroup');	
							$row = mysql_fetch_row($result);
				            foreach($castxe->result() as $data)
				             {
				               echo "<option value= '$data->group_code'";
				               echo ">$data->group_name</option>";
				              } 
							  ?>  
					</select>
					<br>
				</td>
		</tr>		  
		
        <tr>
			<td>
			    <button type="button"  id="Addanother"   class="btn btn-primary" >Add</button>
				<button type="button"  id="AddItem"     disabled  class="btn btn-primary" >Save</button>
				<a href="<?php echo base_url();?>accounts/accounts/index">
				<button type="button"  id="close"  class="btn btn-primary" >Close</button></a>
			</td>
		</tr>
	
		</table>
	</form>
				
				</div>
			</div>
			</div>
