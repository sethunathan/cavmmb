<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>Welcome</title>
  
  <link rel="stylesheet" href="http://localhost/senthil/assetsaccounts/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 	
  <script type="text/javascript">
     $(document).ready(function()
     {
      $(".edit_tr").click(function()
        { 
          var ID=$(this).attr('id'); 
           $("#first_"+ID).hide();
		   $("#second_"+ID).hide();
		   $("#third_"+ID).hide();
		   $("#fourth_"+ID).hide();
           $("#last_"+ID).hide();
		   
           $("#first_input_"+ID).show();
		   $("#second_input_"+ID).show();
		   $("#third_input_"+ID).show();
		   $("#fourth_input_"+ID).show();
           $("#last_input_"+ID).show();
       }).change(function()
      {
		 
        var accode=$(this).attr('id');var ID=$(this).attr('id'); 
        var accname=$("#first_input_"+ID).val();
		var mobile=$("#third_input_"+ID).val();
		var address=$("#second_input_"+ID).val();
		var opnbal=$("#fourth_input_"+ID).val();
        var groupcode=$("#last_input_"+ID).val();
		
        var dataString = {accode:accode,accname:accname,mobile:mobile,address:address,opnbal:opnbal,groupcode:groupcode};//'id='+ ID +'&firstname='+first+'&lastname='+last;
        $("#first_"+ID).html('<img src="load.gif" />'); // Loading image
        
if(accname.length>0&& groupcode.length>0)
{
//alert(dataString);
$.ajax({
type: "POST",
 url: '<?php echo site_url("accounts/updateaccname")?>',
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(accname);
$("#second_"+ID).html(address);
$("#third_"+ID).html(mobile);
$("#fourth_"+ID).html(opnbal);
$("#first_"+ID).html(accname);
//alert(html);
}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>


 </head>
 <body>
   
 </body>
</html>
