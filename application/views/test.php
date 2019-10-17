<body style="background-color: rgb(128, 151, 185);">

<?php include 'body.php';?> 


<form  action="<?php echo base_url(); ?>test/ins"   method="post"
        enctype="multipart/form-data">
		
		    Upload excel file : 
    <input type="file" name="uploadFile" value="" />
    <input type="submit" name="submit" value="Upload" />
		
 
</form>
<br><br>
<form action="<?php echo base_url(); ?>test/testmaster" method="post">
 <input type="text" name="server" value="10.0.0.155:9000" />
<input type="submit" name="submit" value="Test Master" />
		
 
</form>
<?php include 'bodyfooter.php';?>