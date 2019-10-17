<div class="col-sm-12">  
		<div class="table-responsive">
		<p id="test1"></p>
		<div id="acc" ></div>
		
		 <label>Round Off</label> 		
		<input  type="text" class="form-control"  readonly name="roundoff"   id="roundoff"   /><br>  
         <label>Total Amount</label> 		
		<input  type="text" class="form-control"  readonly name="total"   id="total"   /><br> 
			
		 
		<br/><br/>
			
			
</div>
</div>

 	 <script type="text/javascript">
	 function loaddetailss()
	{
		$("#acc").html('');
		var accodefrom=$('#accodefrom').val();
		var ac_code=accodefrom;
		var comp_idd = $("input[name='comp_idd']:checked").val();
		var showall= $("input[name='showall']:checked").val();
		 
	    jQuery.ajax({
		    url: '<?php echo site_url("billing/getbilllist")?>',
		    type:'POST',
			async: false,
			data:{ac_code:ac_code,showall:showall,comp_idd:comp_idd},
		    success:function(response){				
			   $("#acc").html(response);	
			    totalIt();
			},
		    error: function(jqxhr) {
              //  $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
            }
		
	    });
		 
	}
	function billed(sno,id)
	{
		 jQuery.ajax({
		    url: '<?php echo site_url("billing/setbilled")?>',
		    type:'POST',
			async: false,
			data:{id},
		    success:function(response){
				// alert(response);
				 $("#test1").text(response); 
			},
		    error: function(jqxhr) {
              //  $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
            }
		
	    });
		var iid=document.getElementById("sno"+sno).value;
		removerow(iid);
		 
		
		
	}
	function free(sno,id)
	{
		jQuery.ajax({
		    url: '<?php echo site_url("billing/setfree")?>',
		    type:'POST',
			async: false,
			data:{id},
		    success:function(response){		
			//	alert(response);
			    $("#test1").html(response); 
			 
			},
		    error: function(jqxhr) {
              //  $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
            }
		
	    });
		var iid=document.getElementById("sno"+sno).value;
		removerow(iid);
		
	}
	
	function later(id)	{		
		var iid=document.getElementById("sno"+id).value;
		 
		removerow(iid);
		// $("#test1").html(id+ 'Moved'); 
		
	}
	
	function removerow(i)
	{
		var table = document.getElementById('dataTable');
        var rowCount = table.rows.length;
       
        table.deleteRow(i);
        rowCount--;
        i--;
		
		var names = document.getElementsByName('sno[]');
           for (var i = 0, iLen = names.length; i < iLen; i++) {
	        names[i].value=i+1;
          }
		totalIt();
	}
   </script>

<script>
function calc(idx) {	
	var taxableamt = parseFloat(document.getElementById("rate"+idx).value) ;
	var comp_idd = $("input[name='comp_idd']:checked").val();
	 
	if (comp_idd==1)
	{
		var taxper=document.getElementById("taxper"+idx).value/2;			 
		var price=0;var sgst=0;var cgst=0;			
		if (taxper>0)
			{
				sgst=taxableamt*(taxper/100);
				cgst=taxableamt*(taxper/100);
				 
			}	
		price=sgst+cgst+taxableamt;	
		document.getElementById("gst"+idx).value= isNaN(taxper)?"0.00":taxper.toFixed(2);
		document.getElementById("sgst"+idx).value= isNaN(sgst)?"0.00":sgst.toFixed(2);
		document.getElementById("cgst"+idx).value= isNaN(cgst)?"0.00":cgst.toFixed(2);
				
		document.getElementById("taxableamt"+idx).value= isNaN(taxableamt)?"0.00":taxableamt.toFixed(2);
		document.getElementById("price"+idx).value= isNaN(price)?"0.00":price.toFixed(2);
	}
	else if (comp_idd==2)
	{
		document.getElementById("gst"+idx).value= 0;
		document.getElementById("sgst"+idx).value= 0;
		document.getElementById("cgst"+idx).value= 0;
		document.getElementById("taxableamt"+idx).value= 0;
		document.getElementById("price"+idx).value= 0;
		 
	}
          
}

function totalIt() {
    var total=0;
    var comp_idd = $("input[name='comp_idd']:checked").val();
	var names = document.getElementsByName('snoo[]');
    for (var i = 0, iLen = names.length; i < iLen; i++)
		{
	        var m=names[i].value;
		    calc(m);  
			if (comp_idd==1)
	        {
			   var price = parseFloat(document.getElementById("price"+m).value);
			    total += isNaN(price)?0:price;	
			
            } 
            if (comp_idd==2)
	        {
			    var price = parseFloat(document.getElementById("rate"+m).value);
			    total += isNaN(price)?0:price;	
				 
				 
            } 			
        }	  
    if (total>0)
       {
		   var numb = total.toFixed(2)-total.toFixed(0);
           numb = numb.toFixed(2);
           document.getElementById("roundoff").value=numb; 
           document.getElementById("total").value=total.toFixed(0); 
       } 
   }      

    window.onload=function() 
        { 
         document.getElementsByName("rate[]").onkeyup=function() {  totalIt(); };
        }

var rowCount =0;
  
function deleteRow(tableID) {
    try 
	{   
	    var comp_idd = $("input[name='comp_idd']:checked").val();
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        for(var i=0; i<rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if(null != chkbox && true == chkbox.checked) {
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
		
		var names = document.getElementsByName('sno[]');
           for (var i = 0, iLen = names.length; i < iLen; i++) {
	        names[i].value=i+1;
          }
		  
		var total=0;
    
		var names = document.getElementsByName('snoo[]');
		for (var i = 0, iLen = names.length; i < iLen; i++)
			{
				var m=names[i].value;
					
				if (comp_idd==1)
				{
					var price = parseFloat(document.getElementById("price"+m).value);
					total += isNaN(price)?0:price;	
				} 
				if (comp_idd==2)
				{
				   var price = parseFloat(document.getElementById("rate"+m).value);
					total += isNaN(price)?0:price;	
				} 
							   
			}	  
		if (total>0)
		   {
			    var numb = total.toFixed(2)-total.toFixed(0);
                numb = numb.toFixed(2);
			    document.getElementById("roundoff").value=numb; 
                document.getElementById("total").value=total.toFixed(0); 
		   }  
		
    }catch(e) {
            alert(e);
        }
		
	totalIt();	
    }
		 
		 
		</script>
