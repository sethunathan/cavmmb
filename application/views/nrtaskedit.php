<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>

   	 <script type="text/javascript">
$(document).ready(function()
    { 
	  $("#saveaccounts").click(function(event)
	{
		
		savedata();
		$(".entryscreen").hide();
	});
	calcTotal();
	  $('#entry').click(function(event)
	  {
		  $(".entryscreen").show();
	  });
	});
	function calcTotal()
 {
	 
	  
	 var adddaterange1 = $("input[name='starting_date']")
              .map(function(){return $(this).val();}).get();
			  
	  
	var tt = document.getElementById('starting_date').value;

    var date = new Date(tt);
    var newdate = new Date(date);
	
	var newdate1 = new Date(date);
	var newdate2 = new Date(date);
	
    var monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];

    //newdate.setDate(newdate.getDate() + 5);
	
  
	
	var days=7;
	var count = 0;
    while (count < days) {
        newdate1.setDate(newdate1.getDate() + 1);
        if (newdate1.getDay() != 0  ) // Skip weekends if (fromDate.getDay() != 0 && fromDate.getDay() != 6) 
            count++;
    }
	
    var dd = newdate1.getDate();
    var mm = newdate1.getMonth() + 1;//mm=monthShortNames[mm];
    var y = newdate1.getFullYear();
    
	if (dd < 10) {
       dd = '0' + dd;
       } 
    if (mm < 10) {
      mm = '0' + mm;
      } 
    
	var someFormattedDate = dd + '-' +  mm + '-' + y;
	document.getElementById('ending_date').value =someFormattedDate;
	  
	 
	 
	days=5;
	count = 0;
    while (count < days) {
        newdate2.setDate(newdate2.getDate() + 1);
        if (newdate2.getDay() != 0  ) // Skip weekends if (fromDate.getDay() != 0 && fromDate.getDay() != 6) 
            count++;
    } 
	 
	var dd = newdate2.getDate();
    var mm = newdate2.getMonth() + 1; 
    var y = newdate2.getFullYear();
    
	if (dd < 10) {
       dd = '0' + dd;
       } 
    if (mm < 10) {
      mm = '0' + mm;
      } 
    
	someFormattedDate = dd + '-' +  mm + '-' + y;
	document.getElementById('target_date').value =someFormattedDate; 
	 
	  
 }
   
</script>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>nrtask">
            <i class="fa fa-dashboard"></i> <span>Non - Repeative - Task List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">Non - Repeative - Task Details</p>

    <form id="tex" action="<?php echo base_url(); ?>nrtask/savetask/<?php echo $task_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>
        
	 
	 
	<div class="txt-heading" >Services 		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="subjob_code" name="subjob_code">		     
		<?php
		    $this->db->where('job_code',5);
			 	
            $this->db->order_by('subjobname');					
            $this->db->select('subjobname,subjob_code');                      
            $castxe= $this->db->get('massubjob');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->subjob_code'";
                    if($data->subjob_code==$subjob_code) {echo "selected";}
				    echo ">$data->subjobname</option>";
				} 
		?>  
		</select>
      </div>
	</div>  

	<p class="login-box-msg">Ac Name</p>
   <?php include 'othersclientnr.php';?>	 


	 <br/>
	 <div class="txt-heading" id="dialog_title_span">Starting Date
       <div class="form-group has-feedback">
	    
        <input onBlur="calcTotal()" name="starting_date"  id="starting_date" value ="<?php echo $starting_date?>"  
		type="date"   >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
 </div>
 
<div class="txt-heading" id="dialog_title_span">Ending Date
       <div class="form-group has-feedback">
	 
        <input name="ending_date"   id="ending_date" value ="<?php echo $ending_date?>" class="daterange" type="text"  >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
 </div>
 <div class="txt-heading" id="dialog_title_span">Target Date
       <div class="form-group has-feedback">
	 
        <input name="target_date"  id="target_date" value ="<?php echo $target_date?>" class="daterange" type="text"  placeholder="Target Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
 </div>

  <div class="txt-heading" >S.A.C
      <div class="form-group has-feedback">
        <input name="sac" id="sac" value ="<?php echo $sac?>" type="text" class="form-control" placeholder="S.A.C">
    <label for="sac">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  </div>
   <div class="txt-heading" >Tax %
      <div class="form-group has-feedback">
        <input name="taxper" id="taxper" value ="<?php echo $taxper?>" type="text" class="form-control" placeholder="Tax Per">
    <label for="taxper">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  </div>

 <div class="txt-heading" >Amount(>=200)
      <div class="form-group has-feedback">
        <input name="amount" id="amount" value ="<?php echo $amount?>" type="text" class="form-control" placeholder="Amount >=Rs.200">
    <label for="amount">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  </div>
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange	
});	 
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>
 

 <br><br>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id='submitBtn' 
           class="btn btn-primary btn-block btn-flat enableOnInput">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
<script>
$( "form" ).submit(function( event ) {
      var amount =  parseInt($('#amount').val());
      var amount1 =200;
     if( amount < amount1)
      {
        alert('Amount Should be greater than Rs.200');
         
        event.preventDefault();
        $( "#amount" ).focus();
      }
     else
      {
        
       }
});
</script>

    

<?php include 'bodyfooter.php';?>