<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 5.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>Welcome</title>
  <link rel="stylesheet" href="http://localhost/senthil/assetsaccounts/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://localhost/senthil/assetsaccounts/js/jquery-1.11.0.min.js"></script>	
  <script src="http://localhost/senthil/assetsaccounts/js/jquery-ui.js"></script>	
 </head>

 <script>
$( document ).ready(function() {
 
 
  $("#entry").click(function(event)
  {
	
	$(".entryscreen").show();
	$(".mainscreen").hide();
	$("#main").show();
	$("#entry").hide();
  }
  );
    
 $("#main").click(function(event)
  {
	$(".entryscreen").hide();
	$(".mainscreen").show();
	$("#entry").show();
  }
  );	
 
  
});
</script>

 <body >
    <br>
	 	
		
	
	<div class="entryscreen" style="display:none;">
	   <?php include 'contraentryscreen.php';?>
	</div>
	<br>
     <div class="mainscreen"  >
	       <button type="button" id="entry"  class="btn btn-primary" >Add New</button><br>
         <?php include 'contramainscreen.php';?>
	</div>
	
 </body>
</html>
 
<style>
body 
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
}
.editbox
{
display:none
}
td
{
padding:2px;
}
.editbox
{
font-size:14px;
width:100px;
background-color:#ffffcc;
border:solid 1px #000;
padding:2px;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}
 #paginationstar table{
	width:200px;
	margin:0px auto;
	margin-left: 2px;
    margin-right:2px;
	font-family:Tahoma,Arial,Verdana,sans-serif;
	font-size:13px;
	padding:1px;
	border-collapse: collapse;
  }
  .head{
  background:lightseagreen;
  }
 #paginationstar table tr td{
    padding: 1px;
	text-transform:capitalize;
	border:1px solid #d1d1d1;
	}
  
  .paginationstar .current{
  padding: 1px 10px;
color: black;
margin: 1px 0px 9px 6px;
display: block;
text-decoration:none;
float: left;
text-transform: capitalize;
background: whitesmoke;
  }
  .paginationstar .page-numbers{
  padding: 4px 10px;
color: white !important;
margin: 1px 0px 9px 6px;
display: block;
text-decoration:none;
float: left;
text-transform: capitalize;
background:rgb(119, 41, 83);
  }
  

</style>