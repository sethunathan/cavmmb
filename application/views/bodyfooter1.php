</div>
 

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assests/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assests/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker(
	{
		format: "dd-mm-yyyy",
		yearRange: '2000:2050',		 
        changeMonth: true, 
        changeYear: true,
		autoclose: true
    }
	);
  }
  );
  </script>

</body>
</html>